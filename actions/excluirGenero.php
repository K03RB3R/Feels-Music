<?php
$codigo = $_GET["codigo"];

$conexao = mysqli_connect("localhost","root","root","bancofeelsmusic");

mysqli_query($conexao, "DELETE FROM genero WHERE idGenero =".$codigo);


mysqli_close($conexao);

header("Location:../pages/pages_adm/visualizarGenero.php");


 ?>
