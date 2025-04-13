<?php
// Sessao: inicia, define, recupera e destrói sessão
class Sessao
{
    public static function iniciar(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function set(string $chave, $valor): void
    {
        $_SESSION[$chave] = $valor;
    }

    public static function get(string $chave)
    {
        return $_SESSION[$chave] ?? null;
    }

    public static function destruir(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_unset();
            session_destroy();
        }
    }
}
