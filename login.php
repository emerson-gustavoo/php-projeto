<?php
// login.php

// Verifica se existe cookie "lembrar_email" para preencher o campo automaticamente
$emailLembrado = $_COOKIE['lembrar_email'] ?? '';

// Se receber um parâmetro de erro, exibe mensagem contextual
$erro = $_GET['erro'] ?? null;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if ($erro == 1): ?>
        <p style="color:red;">E-mail ou senha incorretos. Tente novamente.</p>
    <?php elseif ($erro == 2): ?>
        <p style="color:red;">Você precisa fazer login para acessar a página desejada.</p>
    <?php endif; ?>

    <form action="processa_login.php" method="POST">
        <label for="email">E-mail:</label>
        <input 
            type="email" 
            name="email" 
            id="email" 
            value="<?php echo htmlspecialchars($emailLembrado); ?>" 
            required
        ><br><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required><br><br>

        <label>
            <input type="checkbox" name="lembrar_email" value="1">
            Lembrar meu e-mail
        </label><br><br>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>
