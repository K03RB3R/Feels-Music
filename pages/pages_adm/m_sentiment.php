
<link rel="stylesheet" href="../css/main.css">
<?php
include("../../includes/permissao.php");
  include("../../includes/verificarLogin.php");
include("../../includes/nav.php");
	$quantidade = 0;

		if(isset($_POST["sentimento"])){
			$sentimento = $_POST["sentimento"];

			$conexao = mysqli_connect("localhost", "root", "", "bancofeelsmusic");
			$query = mysqli_query($conexao,"INSERT INTO sentimento VALUES(DEFAULT, '$sentimento')") or die(mysqli_error($conexao));
			//aparece quantas funcoes foram feitas
      $quantidade = mysqli_affected_rows($conexao);
			mysqli_close($conexao);

			//Script que impede o refresh post
			echo "<script>history.pushState({}, '', '')</script>";
 }
?>
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
				<a class="navbar-brand" href="#">
				<!-- <img src="../../assets/imgs/Icon.png" width="40" height="40" class="d-inline-block align-top" alt=""> -->

				<!-- </a> -->
			<!-- </nav> -->
		</head>
		<body>
			<center>
				<br>
	      <h2>Sentimento</h2>
	      <table class="table table-bordered"></table>
			</center>
			<form method="POST" class="form-inline">
				<br><br><br><br>
	  		<div class="form-group mx-sm-3 mb-2">
	    <label  class="sr-only"></label>
	    <input type="text" class="form-control"  placeholder="Sentimento" name="sentimento" required>
	  </div>
		<button type="submit" style="background-color: #FC9F01;" class="btn warning mb-2">Cadastrar</button>

		<?php if ($quantidade >=1){ ?>
			<div class="alert alert-light alert-dismissible fade show" role="alert">
				<strong>Sentimento cadastrado com sucesso!</strong>
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
