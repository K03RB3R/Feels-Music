<?php
session_start();

$login = isset($_POST["login"]) ? $_POST["login"] : "";
$senha = isset($_POST["senha"]) ? $_POST["senha"] : "";

$conexao = mysqli_connect("localhost", "root", "", "bancofeelsmusic");


// A variavel $result pega as varias $login e $senha, faz uma
//pesquisa na tabela de usuarios
$result = mysqli_query($conexao, "SELECT * FROM `usuario`
WHERE `Nickname` = '$login' AND `Senha`= '$senha'");

/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi
bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor
será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do
resultado ele redirecionará para a página sentimento.php ou retornara  para a página
do formulário inicial para que se possa tentar novamente realizar o login */
if(mysqli_num_rows ($result) > 0 )
{
$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;
// header('location:../pages/pages_usuario/sentimento.php');
header('location:../pages/pages_adm/index_adm.php');
}
else{
  unset ($_SESSION['login']);
  unset ($_SESSION['senha']);
	// echo "<script>alert('Usuario e/ou senha não cadastrado!');</script>";
  header('location:../index.php?erro=254' );

  }

?>
