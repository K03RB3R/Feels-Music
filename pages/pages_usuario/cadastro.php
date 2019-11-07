
<?php

if(isset($_POST["nome"])){
	$nome = $_POST["nome"];
    $dataNasc = $_POST["data_nascimento"];
	$email = $_POST["email"];
	$senha = $_POST["senha"];
	$nick =  $_POST["nickname"];


	$conexao = mysqli_connect("localhost", "root", "", "bancofeelsmusic");


	$query = mysqli_query($conexao,"INSERT INTO usuario (NOME, DATA_NASCIMENTO, EMAIL, SENHA, NICKNAME, TIPO_USUARIO_IDTIPO_USUARIO1,SENTIMENTO_IDSENTIMENTO) VALUES('$nome', '$dataNasc', '$email', '$senha','$nick',1,1)") or die(mysqli_error($conexao));

	$fm = mysqli_affected_rows($conexao);

	$id = mysqli_insert_id($conexao);



	if($fm >= 1){
		echo "<script>alert('Cadastrado com sucesso!');</script>";


	}

	mysqli_close($conexao);
}
?>

<html>
<head></head>

<body>
<form action="" method="post">
<input type="text" name="nome" placeholder="Nome" required>
<input type="date" name="data_nascimento" placeholder="Data de nascimento" required>
<input type="email" name="email" placeholder="E-mail" required>
<input type="password" name="senha" placeholder="Senha" required>
<input type="text" name="nickname" placeholder="Nickname" required>
<input type="submit" value="Cadastrar"/>
</form>

</body>
</html>
