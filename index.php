<?php
if(isset($_GET["erro"])){
	$erro = $_GET["erro"];

	if($erro == 254){
		echo "<script>alert('Usuario e senha incorretos!');</script>";
	}
	else if($erro == 414){
		echo "<script>alert('Usuario nao autenticado!');</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
 <title>Feels Music</title>
 <meta charset='utf-8'/>
 <meta name='author' content="Bruna Ribeiro, Felipe Rangel, Guilherme Koerber e Roberto Casagrande.">
 <link rel="stylesheet" href="css/bootstrap.min.css" />
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
		 <img class="logo" src="assets/imgs/Icon.png"/ width="200" height="250">
		 <h1> Login </h1>
		 <form action="includes/validarLogin.php" name="formlogin" method="post">
			 <div class="form-group">
					<input type="text" class="form-control" id="login" name="login" placeholder="Nickname" required>
			 </div>
			 <div class="form-group">
					<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
			 </div>
				 <button type="submit" style="background-color: #FC9F01;" class="btn btn-warning">Entrar</button>

		 </form>
	 </div>
 </div>
 <footer>
 </footer>
</body>
</html>


<!-- <!DOCTYPE html>
<html>
  <head>
    <title>Feels Music</title>
    <meta charset='utf-8'/>
    <meta name='author' content="Bruna Ribeiro, Felipe Rangel, Guilherme Koerber e Roberto Casagrande.">
  </head>
  <body>
        <form action="includes/validarLogin.php" name="formlogin" method="post">
					<br>
					Nickname:<input type="text" name="login"/>
					Senha: <input type="password" name="senha"/>
					<input type="submit" value="Entrar"/>
					<img class="logo" align="center" src="assets/imgs/Icon.png"/>
					</form>
        </form>
    <footer>
    </footer>
  </body>
</html> -->
