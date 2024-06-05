<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
    session_start();
    if(
    isset($_SESSION['email']) == true and
    isset($_SESSION['senha']) == true and
    ($_SESSION['permissao'] == "S"))
    {
        echo "Logado.";
    }

    else if(
        isset($_SESSION['email']) == true and
        isset($_SESSION['senha']) == true and
        ($_SESSION['permissao'] == "N"))
        {
        echo"<script>alert('Não pode acessar!');</script>";
        # Só coloquei a menssagem, pedida na ad.
        # header('Location: index22.php');
        }

    else{
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['permissao']);
        header('Location: redireciona.php');
    }
    ?>
</head>
<body>
    <h1>Você logou como ADMIN!</h1>
    <a href="gerencia.php">Gerencia</a>
</body>
</html>