<?php 
if(isset($_GET["sentimento"])){
	$sentimento = $_GET["sentimento"];
	
	$conexao = mysqli_connect("localhost", "root", "root", "bancofeelsmusic");

	$query = mysqli_query($conexao,"INSERT INTO sentimento VALUES(DEFAULT, '$sentimento')") or die(mysqli_error($conexao));

	 $quantidade = mysqli_affected_rows($conexao);
	
	// $id = mysqli_insert_id($conexao);
	// //echo $id;
	
	if($quantidade >= 1){
		echo "<script>alert('Cadastrado com sucesso!');</script>";
	}
	mysqli_close($conexao);
}
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<html>
<body>
<form method="get" class="form-inline">

  <div class="form-group mx-sm-3 mb-2">
    <label  class="sr-only"></label>
    Sentimento:<input type="text" class="form-control"  placeholder="" name="sentimento" required>
  </div>
  <button type="submit" class="btn btn-primary mb-2">Adicionar</button>
</form>
</body>
</html>