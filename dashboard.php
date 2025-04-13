<?php
// dashboard.php

require_once __DIR__ . '/classes/Sessao.php';

/**
 * Página restrita: só entra se estiver logado.
 */

Sessao::iniciar();

if (!Sessao::get('usuario_email')) {
    header('Location: login.php?erro=2');
    exit;
}

$nome = Sessao::get('usuario_nome');
$emailCookie = $_COOKIE['lembrar_email'] ?? null;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Área Restrita</title>
</head>
<body>
    <h1>Olá, <?php echo htmlspecialchars($nome); ?>! Seja bem-vindo(a) à área restrita.</h1>

    <?php if ($emailCookie): ?>
        <p>Você optou por lembrar o e-mail: <?php echo htmlspecialchars($emailCookie); ?></p>
    <?php endif; ?>

    <p><a href="logout.php">Logout</a></p>
</body>
</html>
