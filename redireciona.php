<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logado</title>
</head>
<body>
<?php
    session_start();

    var_dump($_POST);
    $email = $_POST["email"];
    $senha = $_POST['senha'];
    $submit = $_POST['submit'];

    if(isset($_POST['submit'])){
        // acessa
        echo "<br>";
        echo "está logado";
        echo "<br>";}

    else{
        // Não acessa
        echo "<br>";
        echo "Não está logado";
        echo "<br>";}


    # Pro banco de dados
    $hostname = 'localhost';
    $user = 'root';
    $senha2 = '1234';
    $banco = 'login';

    $mysqli = new mysqli($hostname, $user, $senha2, $banco);

    if($mysqli ->connect_errno){
        echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        echo "<br>";
    }
    
    else{
        echo "sem erro ao conectar ao banco de dados";
        echo "<br>";}

    $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha';";

    $result = $mysqli->query($sql);
    print_r($result);

    if(mysqli_num_rows($result) < 1){
        header('Location: pagina.html');}
        
    else{
        $sql2 = "SELECT adm FROM usuario WHERE email = '$email';";
        $permissao = $mysqli->query($sql2);
        $user_data = mysqli_fetch_assoc($permissao);
        $permissao = end($user_data);
        echo $permissao;
        
        if ($permissao == "S"){
            header('Location: usuarios.php');}
        
        else if ($permissao == "N"){
            header('Location: index.php');}}

        echo "<br>";        
        echo $email;
        echo "<br>";
        echo $senha;

        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['permissao'] = $permissao;
        ?>

    <br>
    <a href="index.php">Usuários comuns</a>
    <br>
    <a href="usuarios.php">Usuários Admins</a>
</body>
</html>