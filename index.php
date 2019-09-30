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
</html>
