<?php
include("../../includes/permissao.php");
include("../../includes/verificarLogin.php");


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
				header ('location: ../pages_adm/manutencao.php');
			}
		}
		$busca = mysqli_query($conexao, "SELECT * FROM USUARIO WHERE IDUSUARIO = $codigo") or die(mysqli_error($conexao));
		$arrFM = mysqli_fetch_all($busca, MYSQLI_ASSOC)[0];
		mysqli_close($conexao);
	}else{
		$nome = $_POST["nome"];
		$dataNasc = $_POST["data_nascimento"];
		$email = $_POST["email"];
		$senha = $_POST["senha"];
		$nickname =  $_POST["nickname"];


		$conexao = mysqli_connect("localhost", "root", "", "bancofeelsmusic");


		$query = mysqli_query($conexao,"INSERT INTO usuario (NOME, DATA_NASCIMENTO, EMAIL, SENHA, NICKNAME, TIPO_USUARIO_IDTIPO_USUARIO1,SENTIMENTO_IDSENTIMENTO) VALUES('$nome', '$dataNasc', '$email', '$senha','$nickname',2,3)") or die(mysqli_error($conexao));


		$fm = mysqli_affected_rows($conexao);

		$id = mysqli_insert_id($conexao);



		if($fm > 0){
			echo "<script>alert('Cadastrado com sucesso!');</script>";
			header ('location: index_adm.php');

		}

		mysqli_close($conexao);
	}
}else{
	$nome = "";
	$dataNasc= "";
	$email="";
	$senha="";
	$nickname="";
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
		$nickname= $arrFM['nickname'];

	}

}
?>

<html>
	<head>
		<title>Feels Music</title>
	  <meta charset='utf-8'/>
	  <meta name='author' content="Bruna Ribeiro, Felipe Rangel, Guilherme Koerber e Roberto Casagrande.">
	  <link rel="stylesheet" href="../../css/bootstrap.min.css" />
	  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	  <style media="screen">
	 	 body{
	 		 background-color: #171717;
	 	 }
	 	 h2{
	 		 color: #FC9F01
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
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #FC9F01;">
				<a class="navbar-brand" href="../../pages/pages_adm/index_adm.php">Feels Music</a>
				<img src="../../assets/imgs/Icon.png" width="40" height="40">
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav">
							 <!-- <li class="nav-item active">
										<a class="nav-link" href="#">Artistas <span class="sr-only">(Página atual)</span></a>
								</li> -->
								<li class="nav-item">
										<a class="nav-link" href="c_adm.php">Adm</a>
								</li>
								<li class="nav-item">
										<a class="nav-link" href="m_artistas.php">Artistas</a>
								</li>
								<li class="nav-item">
										<a class="nav-link" href="m_album.php">Álbum</a>
								</li>
								<li class="nav-item">
										<a class="nav-link" href="m_sentiment.php">Sentimento</a>
								</li>
								<li class="nav-item">
										<a class="nav-link" href="m_genero.php">Gênero</a>
								</li>
								<li class="nav-item">
										<a class="nav-link" href="m_musica.php">Músicas</a>
								</li>
								<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Manutenções
										</a>
										<div class="dropdown-menu" >
												<a class="dropdown-item" href="visualizarAlbum.php">Álbum</a>
												<a class="dropdown-item" href="visualizarArtista.php">Artistas</a>
												<a class="dropdown-item" href="visualizarSentimento.php">Sentimento</a>
												<a class="dropdown-item" href="visualizarGenero.php">Gênero</a>
												<a class="dropdown-item" href="manutencao.php">Usuários</a>
												<!-- <a class="dropdown-item"href="http://localhost/feels-music/">Sair</a> -->
													<!-- <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"> Sair -->
												<!-- <img src="../../assets/imgs/Icon.png" width="30" height="30" class="d-inline-block align-top" alt=""> -->

											</button>
										</a>
										</div>
								</li>
						</ul>
				</div>
				<div class="d-flex justify-content-between w-100">
					<div class="">
						<!-- <img src="../../assets/imgs/Icon.png" width="40" height="40" class="d-inline-block align-top" alt=""> -->
						<a class="navbar-brand" href="#">	</a>
					</div>
					<a href="http://localhost/feels-music/includes/encerrarLogin.php">
					<button class="btn btn-outline-dark my-5 my-sm-0" type="submit">Sair
						<img src="../../assets/imgs/Icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
					</button>
				</a>
		</nav>
		<center>
		<div class="container">
	 	 <div class="mx-auto" style="width:300px;">
	 		 <br>
			 <img class="logo" src="../../assets/imgs/Icon.png"/ width="200" height="240">
			 <h2>Cadastro de Adm</h2>
				<form action="c_adm.php?<?php echo $url;?>acao=inserir" method="post">
					<div class="form-group">
						<input type="text" name="nome" class="form-control mb-2" placeholder="Nome"  value="<?php echo $nome;?>"required>
					</div>
					<div class="form-group">
						<input type="date" name="data_nascimento" class="form-control mb-2" placeholder="Data de nascimento" value="<?php echo $dataNasc;?>"required>
					</div>
					<div class="form-group">
						<input type="email" name="email" placeholder="E-mail" class="form-control mb-2" value="<?php echo $email;?>"required>
					</div>
					<div class="form-group">
						<input type="password" name="senha" class="form-control mb-2" placeholder="Senha" value="<?php echo $senha;?>" required>
					</div>
					<div class="form-group">
						<input type="text" name="nickname" class="form-control mb-2" placeholder="Nickname" value="<?php echo $nickname;?>"required>
					</div>
					<button type="submit" style="background-color: #FC9F01;" class="btn btn-warning-2">Cadastrar</button>
				</form>
 		 </div>
 	 </div>
 </center>
 	</body>
	<footer class="fixar-rodape">
    Todos os direitos reservados à Feels Music INC - 2019
  </footer>
 	</html>
