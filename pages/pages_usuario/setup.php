<?php
if(isset($_POST["nome"])){
    $code = $_POST["nome"];
} 


$conexao = mysqli_connect("localhost","root","", "bancofeelsmusic");
mysqli_query($conexao, "UPDATE SENTIMENTO SET NOME = $code WHERE IDUSUARIO = $codigo") or die(mysqli_error($conexao));

/*será necessário um INSERT TAMBÉM*/

?>