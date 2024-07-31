<?php
    $nome = null;
    $email = null;
    $senha = null;
    $erro = false;

    if (count($_POST) > 0){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if(empty($nome)){
            $erro = "Preencha o Campo de Nome";
        }
        if(empty($email)){
            $erro = "Preencha o Campo de E-mail";
        }
        if(empty($senha)){
            $erro = "Preencha o Campo de Senha";
        }

        if ($erro) {
            echo "erro: " . $erro;
            echo "
                <a href='http://localhost/www/crudPHP/usuario'>
                    <button>Voltar</button>
                </a>
            ";
            exit;
        }
    }

    // 
    $conexao = mysqli_connect("localhost", "root", "", "crudphp");
    $sql = "INSERT INTO usuario (nome, email, senha)
    VALUES ('$nome', '$email', '$senha')";
    mysqli_query($conexao, $sql);
    mysqli_close($conexao);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud 00</title>
</head>
<body>
    <h2><?= $erro ?></h2>
    <form action="#" method="POST">
        <label for="nome"> Nome
            <input type="text" name="nome" id="nome">
        </label>
        
        <label for="email"> E-mail
            <input type="email" name="email" id="email">
        </label>
        
        <label for="senha"> Senha
            <input type="password" name="senha" id="senha">
        </label>
        
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>