<?php
    session_start();
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
    <title>Login</title>
</head>
<body>

    <div class="container">
        <div class="formulario">

            <h1>Excel Remoto</h1>
            <hr/>
            <br/>
            <br/>

            <form method="POST">

                <p><label for="tNome">Insira seu nome:</label>
                <input class="tBox" type="text" placeholder="Nome" maxlength="50" id="tNome" name="nome"/></p>

                <p><label for="tMail">Insira seu e-mail:</label>
                <input class="tBox" type="email" placeholder="E-mail" maxlength="50" id="tMail" name="email"/></p>

                <p><label for="tSenha">Insira sua senha:</label>
                <input class="tBox" type="password" placeholder="Senha" id="tSenha" maxlength="15" name="senha" /></p>


                <input class="botao" type="submit" value="Entrar">

            </form>

<?php

    if (isset($_POST['nome'])) {

        
        $_SESSION['logado'] = addslashes($_POST['nome']);

        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        if (!empty($nome) && !empty($email) && !empty($senha)) {

            $u->conectar("usuario","localhost","root","");

            if ($u->$msgErro == "") {
                if ($u->logar($nome,$email,$senha)) {

                    header('location: add-data.php');

                }else {

                    ?>

                    <div id="msg-erro-2">E-mail e/ou senha estão incoretos!</div>

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