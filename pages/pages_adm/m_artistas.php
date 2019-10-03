<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php

 if (isset($_POST["nome"])) {
     $nome = $_POST["nome"];

     $conexao = mysqli_connect("localhost", "root", "", "bancofeelsmusic");
     $query = mysqli_query($conexao, "INSERT INTO artista VALUES(DEFAULT, '$nome') ")
      or die(mysqli_error($conexao));
     //aparece quantas funcoes foram feitas
     $quantidade = mysqli_affected_rows($conexao);
     // echo $quantidade;

     if ($quantidade >=1) {
       echo "<script>alert('Cadastrado com sucesso!');</script>";
     }
     //fechar Conexao
     mysqli_close($conexao);
 }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <form class="form-inline" method="post">
      <br><br><br>
      <div class="col-auto">
        <label class="sr-only" for="inlineFormInput">Nome</label>
          <input type="text" name="nome" class="form-control mb-2" id="inlineFormInput" placeholder="Nome">
      </div>
      <button type="submit" style="background-color: #FC9F01;" class="btn warning mb-2">Cadastrar Artista</button>

    </form>
  </body>
</html>
