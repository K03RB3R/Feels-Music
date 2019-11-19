<?php

$codigo = $_GET["codigo"];

echo $codigo;

$conexao = mysqli_connect("localhost", "root", "", "bancofeelsmusic");

mysqli_query($conexao,"DELETE FROM musica WHERE idmusica=".$codigo);

mysqli_close($conexao);

header("Location:../pages/pages_adm/visualizarMusica.php");

 ?>
