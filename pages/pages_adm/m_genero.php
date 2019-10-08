<?php

if (isset($_GET["genero"])){
   $genero = $_GET["genero"];

  $conexao = mysqli_connect("localhost","root", "root", "bancofeelsmusic");

  $query =  mysqli_query($conexao, "INSERT INTO genero VALUES(DEFAULT, '$genero', 1)") or die (mysqli_error($conexao));

  $quantidade = mysqli_affected_rows($conexao);


  mysqli_close($conexao);
}
 ?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<form class="form-inline" method="get">

  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only"></label>
    genero<input type="text" class="form-control" placeholder="" name="genero" required>
  </div>
  <button type="submit" class="btn btn-primary mb-2">Adicionar</button>
  <?php if ($quantidade >=1){ ?>
       <div class="alert alert-light alert-dismissible fade show" role="alert">
         <strong>Artista cadastrado com sucesso!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <?php } ?>
</form>
