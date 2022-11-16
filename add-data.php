<?php

  session_start();

  if (!isset($_SESSION['id_usuario'])) {

    header('HTTP/1.0 403 Forbidden');
    //header('location: index.php');
    exit;

  }

?>

<!DOCTYPE html>
<html lang="pt-br" >

  <head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link href="style/style.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

    <div class="formulario">
      <h1>Excel Remoto</h1>
      <hr/>
      <?php
        if (!empty($_SESSION['logado'])) {

          echo "<div id='logado'>Logado como ".$_SESSION['logado']."</div>";

        }
      ?>
      <br/>

      <form action="script.php" method="POST">

        <p>Escolha a coluna onde quer adicionar os dados:</p>

        <select name="coluna" class="colunas">
        
          <option>A</option>
          <option>B</option>
          <option>C</option>
          <option>D</option>
          <option>E</option>
          <option>F</option>
          <option>G</option>
          <option>H</option>
          <option>I</option>
          <option>J</option>
          <option>K</option>
          <option>L</option>
          <option>M</option>
          <option>N</option>
          <option>O</option>
          <option>P</option>
          <option>Q</option>
          <option>R</option>
          <option>S</option>
          <option>T</option>
          <option>U</option>
          <option>V</option>
          <option>W</option>
          <option>X</option>
          <option>Y</option>
          <option>Z</option>


        </select>
        

        <p><label for="end">Quadra ou Rua:</label>
        <input class="tBox" type="text" name="quadra" placeholder="Quadra ou Rua" maxlength="100" id="end"/></p>

        <br/>

        <p><label for="nome">Nome:</label>
        <input class="tBox" type="text" name="nome" placeholder="Nome em MAIÚSCULO" maxlength="100" id="nome"/></p>

        <br/>

        <p><label for="dados">Dados:</label>
        <input class="tBox" type="text" name="dados" placeholder="Dados a serem adicionados" maxlength="100" id="dados"/></p>

        <br/>

        <input value="ENVIAR PARA EXCEL" type="submit" class="botao"/>

      </form>

      <a id="cadastro" href="cadastrar.php">Novo Cadastro</a>
      <a id="sair" href="sair.php">Sair</a>

    </div>
  
  </body>

</html>