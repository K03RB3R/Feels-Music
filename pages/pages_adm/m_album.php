<?php
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
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/main.css">
	<!DOCTYPE html>
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
				<img src="../../assets/imgs/Icon.png" width="40" height="40" class="d-inline-block align-top" alt="">
				Feels Music - Álbum



        <h2></h2>

				</a>
			</nav>
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
