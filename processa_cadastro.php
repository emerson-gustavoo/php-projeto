<?php
// processa_cadastro.php

require_once __DIR__ . '/classes/Usuario.php';
require_once __DIR__ . '/classes/Autenticador.php';

/**
 * Recebe dados do formulario de cadastro
 * e registra um novo usuário no "banco" (arquivo JSON).
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

    if (!$nome || !$email || !$senha) {
        echo "Preencha todos os campos corretamente.";
        exit;
    }

    $usuario = new Usuario($nome, $email, $senha);

    $autenticador = new Autenticador();
    $sucesso = $autenticador->registrar($usuario);

    if ($sucesso) {
        echo "Usuário cadastrado com sucesso!<br>";
        echo '<a href="login.php">Clique aqui para fazer login</a>';
    } else {
        echo "Já existe um usuário com esse e-mail.<br>";
        echo '<a href="cadastro.php">Voltar ao cadastro</a>';
    }
} else {
    echo "Método inválido.";
}
