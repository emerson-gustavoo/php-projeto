<?php
// Usuario: armazena dados e valida senha via hash
class Usuario
{
    private string $nome;
    private string $email;
    private string $senhaHash;

    public function __construct(string $nome, string $email, string $senha)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    }

    public static function reconstruir(string $nome, string $email, string $hash): self
    {
        $u = new self($nome, $email, '');
        $u->senhaHash = $hash;
        return $u;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

 
    /**
     * Retorna o hash da senha (para persistência em JSON)
     *
     * @return string
     */
    public function getSenhaHash(): string
    {
        return $this->senhaHash;
    }

    public function autenticar(string $email, string $senha): bool
    {
        return $this->email === $email && password_verify($senha, $this->senhaHash);
    }
}
