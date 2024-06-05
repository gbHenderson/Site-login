<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
    session_start();
    if(
    (!isset($_SESSION['permissao']) == true))
    {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: redireciona.php');}

    $logado = $_SESSION['email'];
    ?>
</head>
<body>
    <h1>Você logou como usuário.</h1>
    <a href="gerencia.php">Gerencia</a>
</body>
</html>