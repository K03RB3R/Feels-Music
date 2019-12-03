<?php
  include("../../includes/permissao.php");
  include("../../includes/verificarLogin.php");
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
			<meta charset="utf-8">
			<style media="screen">
			body{
				background-color: #171717;
			}
			h2{
			color: #FC9F01;


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
			<!-- <nav class="navbar navbar-light" style="background-color: #FC9F01;">
				<!-- <div class="d-flex justify-content-between w-100"> -->
					<!-- <div class=""> -->
						<!-- <img src="../../assets/imgs/Icon.png" width="40" height="40" class="d-inline-block align-top" alt=""> -->
						<!-- <a class="navbar-brand" href="#">	</a> -->
					<!-- </div> -->
					<!-- <div class="">

						</a>
					</div>
				</div>
			</nav> -->
		</head>
		<body>
			<center>
				<br>
	      <h2>Álbum</h2>
        <img class="logo" src="../../assets/imgs/Icon.png"/ width="180" height="220">
	      <table class="table table-bordered">
				</table>
			</center>

			<a class="navbar-brand" href="#"></a>
			<form method="POST" class="form-inline">

	  		 <div class="form-group mx-sm-3 mb-2">
    	    <label  class="sr-only">Álbum</label>
    	    <input type="text" class="form-control mb-2" placeholder="Álbum" name="album" required>
	       </div>


        <div class="form-group mx-sm-3 mb-2">
          <label  class="sr-only"></label>
          <input type="date" class="form-control mb-2"  placeholder="Ano" name="ano" required>
        </div>

    		<div class="form-group mx-sm-3 mb-2">
        	<label for="inlineFormImput" class="sr-only">musica_idartista</label>
        	<select class="form-control mb-2" name="musica_idartista" required>
    		<option value="">Selecione o Artista</option>

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


      <button type="submit" style="background-color: #FC9F01;" class="btn warning mb-3">Cadastrar</button>

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
