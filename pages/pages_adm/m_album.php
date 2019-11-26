<?php

	include("../../includes/nav.php");
	$quantidade = 0;

		if(isset($_POST["album"])){
			$album = $_POST["album"];
			$ano = $_POST["ano"];
			$artista = $_POST["artista"];

			$conexao = mysqli_connect("localhost", "root", "", "bancofeelsmusic");
			$query = mysqli_query($conexao,"INSERT INTO album (idalbum, ano_lancamento, nome, artista_idartista) VALUES(1, '$ano','$album', '$artista')") or die(mysqli_error($conexao));

      $quantidade = mysqli_affected_rows($conexao);
			mysqli_close($conexao);


			echo "<script>history.pushState({}, '', '')</script>";
 }
?>




<link rel="stylesheet" href="../css/main.css">
	<!DOCTYPE html>
	<html>
		<head>
		
		</head>
		<body>

			<form method="POST" class="form-inline">
				<br><br><br><br>
	  		<div class="form-group mx-sm-3 mb-2">
	    <label  class="sr-only">album</label>
	    <input type="text" class="form-control"  placeholder="Álbum" name="album" required>
	     </div>


    <div class="form-group mx-sm-3 mb-2">
  <label  class="sr-only"></label>
  <input type="date" class="form-control"  placeholder="Ano" name="ano" required>
    </div>
    <br><br><br><br>
		<div class="col-auto">
			 <label for="inlineFormImput" class="sr-only">musica_idartista</label>
			 <select class="form-control mb-2" name="musica_idartista">
				 <option>Selecione o Artista</option>

			 <?php
			 $conexao = mysqli_connect("localhost","root", "", "bancofeelsmusic");
			 $artista_idartista = "SELECT * FROM artista";
			 $artista_idartista = mysqli_query($conexao, $artista_idartista);

			 while ($row_artista_idartista = mysqli_fetch_assoc($artista_idartista) ) {
			 ?>
				 <option value="<?php echo $row_artista_idartista['idartista'];?>">
					 <?php echo $row_artista_idartista['nome'];?>
				 </option>
			 <?php
				}
				?>
			</select>

		</div>
    <br><br><br><br>


    <button type="submit" style="background-color: #FC9F01;" class="btn warning mb-2">Cadastrar</button>

		<?php if ($quantidade >=1){ ?>
			<div class="alert alert-light alert-dismissible fade show" role="alert">
				<strong>Álbum cadastrado com sucesso!</strong>
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
