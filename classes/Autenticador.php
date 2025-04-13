<?php
// Autenticador: lê e grava usuários em data/usuarios.json
require_once 'Usuario.php';

class Autenticador
{
    private static string $caminhoArquivo = __DIR__ . '/../data/usuarios.json';
    private array $usuarios;

    public function __construct()
    {
        $this->usuarios = $this->carregarUsuarios();
    }

    private function carregarUsuarios(): array
    {
        if (!file_exists(self::$caminhoArquivo)) {
            return [];
        }
        $lista = json_decode(file_get_contents(self::$caminhoArquivo), true) ?: [];
        $usuarios = [];
        foreach ($lista as $item) {
            $usuarios[] = Usuario::reconstruir($item['nome'], $item['email'], $item['senhaHash']);
        }
        return $usuarios;
    }

    private function salvarUsuarios(): void
    {
        $out = [];
        foreach ($this->usuarios as $u) {
            $out[] = [
                'nome'      => $u->getNome(),
                'email'     => $u->getEmail(),
                'senhaHash' => $u->getSenhaHash(),
            ];
        }
        file_put_contents(self::$caminhoArquivo, json_encode($out, JSON_PRETTY_PRINT));
    }

    public function registrar(Usuario $usuario): bool
    {
        foreach ($this->usuarios as $u) {
            if ($u->getEmail() === $usuario->getEmail()) {
                return false;
            }
        }
        $this->usuarios[] = $usuario;
        $this->salvarUsuarios();
        return true;
    }

    public function logar(string $email, string $senha): ?Usuario
    {
        foreach ($this->usuarios as $u) {
            if ($u->autenticar($email, $senha)) {
                return $u;
            }
        }
        return null;
    }
}
