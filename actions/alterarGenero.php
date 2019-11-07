<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>





<?php
$codigo = isset($_GET["codigo"]) ? $_GET["codigo"] : "";
$conexao = mysqli_connect("localhost","root","", "bancofeelsmusic");

if(isset($_POST["genero"])){
echo $_POST["genero"];
    $genero = $_POST["genero"];
    mysqli_query($conexao, "UPDATE genero SET nome = '$genero' WHERE idgenero = $codigo") or die(mysqli_error($conexao));
    $alterou = mysqli_affected_rows($conexao);
    if($alterou > 0){
      header("Location:../pages/pages_adm/visualizarGenero.php");
      echo "<script>alert('Alterado com sucesso!')</script>";


    }

}
$busca = mysqli_query($conexao, "SELECT * FROM genero WHERE idgenero = $codigo") or die(mysqli_error($conexao));
$arrGenero = mysqli_fetch_all($busca, MYSQLI_ASSOC);


mysqli_close($conexao);

?>

<html>
<head>
  <meta charset="utf-8">
  <style media="screen">
  body{
    background-color: #171717;
  }
  footer.fixar-rodape{
     border-top: 1px solid #333;
     bottom: 0;
     left: 0;
     height: 30px;
     position: fixed;
     width: 100%;
     background: #171717;
     color: #ffffff;
     }
        </style>
        <nav class="navbar navbar-light" style="background-color: #FC9F01;">
          <a class="navbar-brand" href="#">
          <img src="../assets/imgs/Icon.png" width="40" height="40" class="d-inline-block align-top" alt="">
          Feels Music
          </a>
        </nav>
      </head>
      <body>
        <form class="form-inline" method="post">
          <br><br><br><br>
          <div class="col-auto">
            <label class="sr-only" for="inlineFormInput">Nome</label>
              <input type="text" name="genero" class="form-control mb-2" id="inlineFormInput" placeholder="Nome" value="<?php echo $arrGenero[0]["nome"]; ?>"/>
              <input type="hidden" name="codigo" value="<?php echo $codigo; ?>"/>
          </div>
          <button type="submit" style="background-color: #FC9F01;" class="btn btn-warning mb-2">Editar Gênero</button>
        </form>
      </body>
      <footer class="fixar-rodape">
    Todos os direitos reservados à Feels Music INC - 2019
  </footer>
</html>
