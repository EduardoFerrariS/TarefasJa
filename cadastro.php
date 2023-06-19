<?php

include_once "conexao.php";


$nome="";
$senha="";
$email="";

$acao=2;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="validar.js"></script>
  <title>Document</title>
</head>

<body>
  <div class="container">
    <form class="container" action="valida_cadastro.php?acao=<?=$acao?>" method="post" onsubmit="return validarFormulario()">
      <div class="cadastro">
        <h2>Cadastro</h2>
        <div>
          <label for="email">Email:</label>
          <input type="email" name="email" placeholder="Seu Email" value="<?=$email?>" required>
          <span id="erroEmail" class="erro"></span>
        </div>
        <div>
          <label for="nome">Nome:</label>
          <input type="text" name="nome" placeholder="Seu nome" value="<?=$nome?>" required>
          <span id="erroNome" class="erro"></span>
        </div>
        <div>
          <label for="senha">Senha:</label>
          <input type="password" name="senha" placeholder="Crie uma senha" value="<?=$senha?>" required>
          <span id="erroSenha" class="erro"></span>
        </div>
        <div class="button-cadastro">
          <button type="submit">Cadastrar</button>
        </div>
        <?php
        if(isset($_GET['erro'])) {
          ?>
          <div class="alert alert-success">
            <?php
            echo "Usuário já cadastrado!";
          }
          ?>
        </div>
      </form>
    </div>
  </body>

  </html>
