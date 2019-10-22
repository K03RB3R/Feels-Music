<!DOCTYPE html>
<html>
<head>
 <title>Feels Music</title>
 <meta charset='utf-8'/>
 <meta name='author' content="Bruna Ribeiro, Felipe Rangel, Guilherme Koerber e Roberto Casagrande.">
 <link rel="stylesheet" href="css/bootstrap.min.css" />
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 <style media="screen">
	 body{
		 background-color: #171717;
	 }
	 h1{
		 color: #FC9F01
	 }
 </style>
</head>
<body>
 <div class="container">
	 <div class="mx-auto" style="width:200px;">
		 <br>
		 <img class="logo" src="assets/imgs/Icon.png"/ width="220" height="270">
		 <h1> Login </h1>
		 <form action="includes/validarLogin.php" name="formlogin" method="post">
			 <div class="form-group">
					<input type="text" class="form-control" id="login" name="login" placeholder="Apelido" required>
			 </div>
			 <div class="form-group">
					<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
			 </div>
				 <button type="submit" style="background-color: #FC9F01;" class="btn btn-warning">Entrar</button>
         <a href="pages/pages_usuario/cadastro.php" style="background-color: #FC9F01;" class="btn btn-warning" type="button" name="cadastrar">Cadastrar-se</a>
				 <?php
				 if(isset($_GET["erro"])){
				  $erro = $_GET["erro"];

				  if($erro == 254){
				 	 ?>
				 	 <div class="alert alert-light alert-dismissible fade show" role="alert">
				 		 <strong>Apelido e/ou senha inválidos</strong>
				 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				 			<span aria-hidden="true">&times;</span>
				 		</button>
				 	</div>
				  <?php }
				  else if($erro == 414){ ?>
				 	 <div class="alert alert-light alert-dismissible fade show" role="alert">
				 		<strong>Apelido e/ou senha inválidos</strong>
				 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				 			<span aria-hidden="true">&times;</span>
				 		</button>
				 	</div>
				  <?php }
				 }
				 ?>
		 </form>
	 </div>
 </div>
 <footer>
 </footer>
</body>
</html>
