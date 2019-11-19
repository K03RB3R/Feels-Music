
<link rel="stylesheet" href="../css/main.css">
<?php
  include("../../includes/nav.php");
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
