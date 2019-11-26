
<link rel="stylesheet" href="../css/main.css">

<?php
include("../../includes/nav.php");
  $quantidade = 0;


if (isset($_POST["nome"])){
   $nome = $_POST["nome"];
   $genero_idgenero = $_POST["genero_idgenero"];

  $conexao = mysqli_connect("localhost","root", "", "bancofeelsmusic");

  $query =  mysqli_query($conexao, "INSERT INTO genero VALUES(DEFAULT, '$nome', $genero_idgenero) ") or die (mysqli_error($conexao));

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
        <label for="inlineFormImput" class="sr-only">Gênero</label>
      <input type="text" class="form-control mb-2"  id="inlineFormImput" placeholder="Nome" name="nome" required>
      </div>
      <div class="col-auto">
         <label for="inlineFormImput" class="sr-only">musica_idgenero</label>
         <select class="form-control mb-2" name="genero_idgenero">
           <option>Selecione o Sentimento</option>

         <?php
         $conexao = mysqli_connect("localhost","root", "", "bancofeelsmusic");
         $musica_idsentimento = "SELECT * FROM sentimento";
         $musica_idsentimento = mysqli_query($conexao, $musica_idsentimento);

         while ($row_musica_idsentimento = mysqli_fetch_assoc($musica_idsentimento) ) {
         ?>
           <option value="<?php echo $row_musica_idsentimento['idsentimento'];?>">
             <?php echo $row_musica_idsentimento['nome'];?>
           </option>
         <?php
          }
          ?>
        </select>

      </div>

      <button type="submit" style="background-color: #FC9F01;" class="btn warning mb-2">Cadastrar Gênero</button>

      <?php if ($quantidade >=1){ ?>
           <div class="alert alert-light alert-dismissible fade show" role="alert">
             <strong>Gênero cadastrado com sucesso!</strong>
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
