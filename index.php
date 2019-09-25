<?php 

if(isset($_POST["nome"])){
	$nome = $_POST["nome"];
    $dataNasc = $_POST["dataNasc"];
    $email = $_POST["email"];
	
	$conexao = mysqli_connect("localhost", "root", "root", "bancofeelsmusic");

	$query = mysqli_query($conexao,"INSERT INTO usuario VALUES(DEFAULT, '$nome', $dataNasc, '$email')") or die(mysqli_error($conexao));

	$fm = mysqli_affected_rows($conexao);
	
	$id = mysqli_insert_id($conexao);
	echo $id;
	
	if($fm >= 1){
		echo "<script>alert('Cadastrado com sucesso!');</script>";
	}
	
	
	mysqli_close($conexao);

}
?>

