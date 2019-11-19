<link rel="stylesheet" href="../css/main.css">

<?php
include("../../includes/nav.php");
  $quantidade = 0;


if (isset($_POST["nome"])){
   $titulo = $_POST["titulo"];
   $musica_idgenero = $_POST["musica_idgenero"];
   $album_idalbum = $_POST["album_idalbum"];

  $conexao = mysqli_connect("localhost","root", "", "bancofeelsmusic");

  $query =  mysqli_query($conexao, "INSERT INTO musica VALUES(DEFAULT, '$titulo', $musica_idgenero, $album_idalbum) ") or die (mysqli_error($conexao));

  $quantidade = mysqli_affected_rows($conexao);

    mysqli_close($conexao);
    //Script que impede o refresh post
    echo "<script>history.pushState({}, '', '')</script>";
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    
  </head>
  <body>
    <form class="form-inline" method="post">
      <br><br><br><br>
      <div class="col-auto">
        <label for="inlineFormImput" class="sr-only">Musica</label>
      <input type="text" class="form-control mb-2"  id="inlineFormImput" placeholder="Nome" name="titulo" required>
      </div>

      <div class="col-auto">
        <label for="inlineFormImput" class="sr-only">musica_idgenero</label>
      <input type="number" class="form-control mb-2"  id="inlineFormImput" placeholder="idgenero" name="musica_idgenero" required>
      </div>

      <div class="col-auto">
        <label for="inlineFormImput" class="sr-only">album_idalbum</label>
      <input type="number" class="form-control mb-2"  id="inlineFormImput" placeholder="idalbum" name="album_idalbum" required>
      </div>
      <button type="submit" style="background-color: #FC9F01;" class="btn warning mb-2">Cadastrar Música</button>

      <?php if ($quantidade >0){ ?>
           <div class="alert alert-light alert-dismissible fade show" role="alert">
             <strong>Música cadastrado com sucesso!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      <?php } ?>
    </form>
  </body>
  <footer class="fixar-rodape">
    Todos os direitos reservados à Feels Music INC - 2019
  </footer>
</html>
