<?php

$codigo = $_GET["codigo"];

$conexao = mysqli_connect("localhost","root","","bancofeelsmusic");

mysqli_query($conexao, "DELETE FROM genero WHERE idgenero =".$codigo);

mysqli_close($conexao);

header("Location:../pages/pages_adm/visualizarGenero.php");


 ?>
