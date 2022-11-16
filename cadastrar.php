<?php

    session_start();

    if (!isset($_SESSION['id_usuario'])) {

        header('location: index.php');
        exit;

    }

    require_once 'classes/usuario.php';
    $u = new Usuario;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/style.css" rel="stylesheet">
    <title>Cadastro</title>
</head>
<body>

    <div class="container">
        <div class="formulario">

            <h1>Cadastro de Usuários</h1>
            <hr/>
            <?php
                if (!empty($_SESSION['logado'])) {

                    echo "<div id='logado'>Logado como ".$_SESSION['logado']."</div>";
          
                }
            ?>
            <br/>

            <form method="POST">

                <p><label for="tNome">Insira seu nome:</label>
                <input class="tBox" type="text" placeholder="Nome" maxlength="50" id="tNome" name="nome"/></p>

                <p><label for="tMail">Insira seu e-mail:</label>
                <input class="tBox" type="email" placeholder="E-mail" maxlength="50" id="tMail" name="email"/></p>

                <p><label for="tSenha">Insira sua senha:</label>
                <input class="tBox" type="password" placeholder="Senha" id="tSenha" maxlength="15" name="senha" /></p>

                <p><label for="tConfsenha">Confirme sua senha:</label>
                <input class="tBox" type="password" placeholder="Confirme a senha" id="tConfsenha" maxlength="15" name="confSenha" /></p>

                <input class="botao" type="submit" value="Cadastrar">

            </form>

            <a id="voltar" href="add-data.php">Voltar</a>
            <a id="sair" href="sair.php">Sair</a>

        
        
    

<?php

    if (isset($_POST['nome'])) {

        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $confirmarSenha = addslashes($_POST['confSenha']);

        if (!empty($nome) && !empty($email) && !empty($senha)) {

            $u->conectar("login","localhost","root","");

            if ($u->$msgErro == "") {

                if ($senha == $confirmarSenha) {


                    if ($u->cadastrar($nome,$email,$senha)) {

                        ?>

                        <div id="msg-sucesso">Usuário cadastrado com sucesso!</div>

                        <?php

                    }else {

                        ?>

                        <div id="msg-erro-1">E-mail já cadastrado!</div>

                        <?php


                    }


                }else {

                    ?>

                    <div id="msg-erro-2">Senha e Confirmar Senha não correspondem!</div>

                    <?php
                }
                

            }else {

                echo "<div id='msg-erro-1'>Erro: ".$u->$msgErro."</div>";

            }

        }else {

            ?>

            <div id="msg-erro-2">Preencha todos os campos!</div>

            <?php
    
        }

    }


?>

    </div>

</div>

</body>

</html>