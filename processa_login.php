<?php
// processa_login.php

require_once __DIR__ . '/classes/Autenticador.php';
require_once __DIR__ . '/classes/Sessao.php';

/**
 * Recebe dados do formulario de login e tenta autenticar.
 */

Sessao::iniciar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
    $lembrarEmail = isset($_POST['lembrar_email']);

    $autenticador = new Autenticador();
    $usuario = $autenticador->logar($email, $senha);

    if ($usuario) {
        // Login bem-sucedido
        Sessao::set('usuario_nome', $usuario->getNome());
        Sessao::set('usuario_email', $usuario->getEmail());

        if ($lembrarEmail) {
            setcookie('lembrar_email', $usuario->getEmail(), time() + 60*60*24*30); // 30 dias
        } else {
            setcookie('lembrar_email', '', time() - 3600);
        }

        // Redireciona para a área restrita
        header('Location: dashboard.php');
        exit;
    } else {
        // Falha no login
        header('Location: login.php?erro=1');
        exit;
    }
} else {
    echo "Método inválido.";
}
