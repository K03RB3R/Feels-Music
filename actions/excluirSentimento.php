<?php
$codigo = $_GET["codigo"];

$conexao = mysqli_connect("localhost","root","root","bancofeelsmusic");

mysqli_query($conexao,"DELETE FROM sentimento WHERE idSentimento=".$codigo);

mysqli_close($conexao);

header("Location:../pages/pages_adm/m_sentiment.php");

?>