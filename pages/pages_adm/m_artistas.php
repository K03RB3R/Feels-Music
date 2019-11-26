<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/main.css">
<?php
  $quantidade = 0;

 if (isset($_POST["nome"])) {
     $nome = $_POST["nome"];

     $conexao = mysqli_connect("localhost", "root", "", "bancofeelsmusic");
     $query = mysqli_query($conexao, "INSERT INTO artista VALUES(DEFAULT, '$nome') ")
      or die(mysqli_error($conexao));
     //aparece quantas funcoes foram feitas
     $quantidade = mysqli_affected_rows($conexao);
     // fechar Conexao
     mysqli_close($conexao);

     //Script que impede o refresh post
     echo "<script>history.pushState({}, '', '')</script>";
 }
  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
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
      <div class="d-flex justify-content-between w-100">
        <div class="">
          <img src="../../assets/imgs/Icon.png" width="40" height="40" class="d-inline-block align-top" alt="">
          <a class="navbar-brand" href="#">	Feels Music - Artista	</a>
        </div>
        <div class="">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            <img src="../../assets/imgs/Icon.png" width="40" height="40" class="d-inline-block align-top" alt="">
          </button>
        </div>
      </div>
    </nav>
  </head>
  <body>
  </head>
  <body>
    <form class="form-inline" method="post">
      <br><br><br><br>
      <div class="col-auto">
        <label class="sr-only" for="inlineFormInput">Nome</label>
          <input type="text" name="nome" class="form-control mb-2" id="inlineFormInput" placeholder="Nome" required>
      </div>
      <button type="submit" style="background-color: #FC9F01;" class="btn warning mb-2">Cadastrar Artista</button>

      <?php if ($quantidade >=1){ ?>
        <div class="alert alert-light alert-dismissible fade show" role="alert">
          <strong>Artista cadastrado com sucesso!</strong>
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
