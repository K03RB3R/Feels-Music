<?php
$codigo = $_GET["codigo"];

echo $codigo;

$conexao = mysqli_connect("localhost","root","root","bancofeelsmusic");

mysqli_query($conexao, "DELETE FROM genero WHERE idgenero =".$codigo);


mysqli_close($conexao);

header("Location:../pages/pages_adm/m_genero.php");


 ?>
