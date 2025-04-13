<?php
// cadastro.php
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastro de Usuário</h1>
    <form action="processa_cadastro.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
