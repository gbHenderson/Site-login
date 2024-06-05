<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerencia</title>

    <?php 
        # Para pegar os valores.
        $nome_add = $_GET["name_add"]??"";
        $email_add = $_GET["email_add"]??"";
        $senha_add = $_GET["senha_add"]??"";
        $permissao_add = $_GET["permissao_add"]??"";
        $submit_add = $_GET["submit_add"]??"nao";

        $id_rem = $_GET["id_rem"]??"";
        $submit_rem = $_GET["submit_rem"]??"nao";
    ?>
</head>
<body>
    <h1>Você está na gerencia de contas.</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
            <fieldset class="ident">
                <legend>Adicionar</legend>
                   <p>
                       <label for="Nome">Nome: </label>
                       <input size="28" placeholder="Digite seu nome..." required type="text" name="name_add" id="name_add"> 
                   
                       <label for="Email">Email: </label>
                       <input size="28" placeholder="Digite seu e-mail..." required type="email" name="email_add" id="email_add">
                       
                       <label for="Senha">Senha: </label>
                       <input placeholder="Digite sua senha..." type="password" required name="senha_add"
                       id="senha_add">

                       <label for="Permissão">Permissão(S/N): </label>
                       <input size="1" required type="text" name="permissao_add" id="permissao_add" maxlength="1">

                       <input type="submit" name="submit_add" id="submit_add">
                    </p>
            </fieldset>
        </form>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
            <fieldset class="ident">
                <legend>Remover</legend>
                <p>
                       <label for="Nome">ID: </label>
                       <input size="5" placeholder="id..." required type="number" name="id_rem" id="id_rem"> 
                       <input type="submit" name="submit_rem" id="submit_rem">
                </p>
            </fieldset>
        </form>

    <tr>
        <th scope="col">Id</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Senha</th>
        <th scope="col">Permissão</th>
    </tr>

    <?php
    session_start();
    if(
    (!isset($_SESSION['permissao']) == true))
    {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: redireciona.php');}


    # Pro banco de dados
    $hostname = 'localhost';
    $user = 'root';
    $senha2 = '1234';
    $banco = 'login';

    $mysqli = new mysqli($hostname, $user, $senha2, $banco);

    $sql3 = "SELECT * FROM usuario;";
    $permissao3 = $mysqli->query($sql3);

    while($user_data3 = mysqli_fetch_assoc($permissao3)){
        echo "<br>";
        echo $user_data3['id'] . " - " . $user_data3['nome'];
        echo "<br>";
        echo $user_data3['id'] . " - " . $user_data3['email'];
        echo "<br>";
        echo $user_data3['id'] . " - " .$user_data3['senha'];
        echo "<br>";
        echo $user_data3['id'] . " - " .$user_data3['adm'];
        echo "<br>";}

    if($submit_add != "nao"){
    $adicionar = "insert into usuario(nome, email, senha, adm) values ('$nome_add', '$email_add', '$senha_add', '$permissao_add');";
    $faz_add = $mysqli->query($adicionar);}

    # Envie 2x o id para apagar ou atualize a página.
    if($submit_rem != "nao"){
    $remove = "delete from usuario where id = $id_rem;";
    $faz_rem = $mysqli->query($remove);}
    ?>
</body>
</html>