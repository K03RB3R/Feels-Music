

<?php


if (isset ($_GET['excluir'])){
	$conexao = mysqli_connect("localhost","root","", "bancofeelsmusic");
	mysqli_query($conexao, "DELETE FROM USUARIO WHERE idusuario = $_GET[id]")or die(mysqli_error($conexao));
	header("Location: ../pages_adm/manutencao.php");
}else if(isset($_GET['acao'])){

	if(isset($_GET['idusuario'])){
		$codigo = isset($_GET["idusuario"]) ? $_GET["idusuario"] : "";
		$conexao = mysqli_connect("localhost","root","", "bancofeelsmusic");

		if(isset($_POST["nome"])){
			$nome = $_POST["nome"];
			$dataNasc = $_POST["data_nascimento"];
			$email = $_POST["email"];
			$senha = $_POST["senha"];
			$nickname = $_POST["nickname"];

			mysqli_query($conexao, "UPDATE USUARIO SET NOME = '$nome',DATA_NASCIMENTO = $dataNasc, EMAIL='$email',SENHA='$senha',NICKNAME='$nickname' WHERE IDUSUARIO = $codigo") or die(mysqli_error($conexao));
			$alterou = mysqli_affected_rows($conexao);
			if($alterou > 0){
				echo "<script>alert('Alterado com sucesso!')</script>";
			}
		}
		$busca = mysqli_query($conexao, "SELECT * FROM USUARIO WHERE IDUSUARIO = $codigo") or die(mysqli_error($conexao));
		$arrFM = mysqli_fetch_all($busca, MYSQLI_ASSOC);
		mysqli_close($conexao);
	}else{
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
}else{
	$nome = "";
	$dataNasc= "";
	$email="";
	$senha="";
	$usuario="";
	$url="";
	if(isset($_GET['id'])){
		$url = "idusuario=$_GET[id]&";
		$conexao = mysqli_connect("localhost", "root", "", "bancofeelsmusic");

		$busca = mysqli_query($conexao, "SELECT * FROM USUARIO WHERE IDUSUARIO = $_GET[id]") or die(mysqli_error($conexao));
		$arrFM = mysqli_fetch_all($busca, MYSQLI_ASSOC)[0];
	
		$nome = $arrFM['nome'];
		$dataNasc= $arrFM['data_nascimento'];
		$email= $arrFM['email'];
		$senha= $arrFM['senha'];
		$usuario= $arrFM['nickname'];
	}

}
?>

<html>
<head></head>

<body>
<form action="cadastro.php?<?php echo $url;?>acao=inserir" method="post">
<input type="text" name="nome" placeholder="Nome"  value="<?php echo $nome;?>"required>
<input type="date" name="data_nascimento" placeholder="Data de nascimento" value="<?php echo $dataNasc;?>"required>
<input type="email" name="email" placeholder="E-mail"  value="<?php echo $email;?>"required>
<input type="password" name="senha" placeholder="Senha" value="<?php echo $senha;?>" required>
<input type="text" name="nickname" placeholder="Nickname" value="<?php echo $usuario;?>"required>
<input type="submit" value="Cadastrar"/>
</form>

</body>
</html>

<br /><b>Notice</b>:  Undefined variable: usuario in <b>C:\xampp\htdocs\Feels-Music\pages\pages_usuario\cadastro.php</b> on line <b>94</b><br />