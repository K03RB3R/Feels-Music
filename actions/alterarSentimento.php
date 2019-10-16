<?php
$codigo = isset($_GET["codigo"]) ? $_GET["codigo"] : "";
$conexao = mysqli_connect("localhost","root","root", "bancofeelsmusic");

if(isset($_GET["sentimento"])){
    echo $_GET["sentimento"];
	$sentimento = $_GET["sentimento"];
	mysqli_query($conexao, "UPDATE sentimento SET nome = '$sentimento' WHERE idsentimento = $codigo") or die(mysqli_error($conexao));
	$alterou = mysqli_affected_rows($conexao);
	if($alterou > 0){
		echo "<script>alert('Alterado com sucesso!')</script>";
	}
}
$busca = mysqli_query($conexao, "SELECT * FROM sentimento WHERE idsentimento = $codigo") or die(mysqli_error($conexao));
$arrSentimento = mysqli_fetch_all($busca, MYSQLI_ASSOC);


mysqli_close($conexao);


?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<html>
<head></head>
<body>

<form action="" method="get">
Nome:<input name="sentimento" type="text" value="<?php echo $arrSentimento[0]["nome"]; ?>"/><br>
<input type="hidden" name="codigo" value="<?php echo $codigo; ?>"/>
<input type="submit" value="Editar"/>
</form>
</body>
</html>