<?php 
$conexao = mysqli_connect("localhost","root","", "bancofeelsmusic");

$buscaSentimento = mysqli_query($conexao, "SELECT * FROM sentimento WHERE idsentimento") or die(mysqli_error($conexao));
$buscaGenero = mysqli_query($conexao, "SELECT * FROM genero WHERE idgenero") or die(mysqli_error($conexao));
$arrayBuscaS = mysqli_fetch_all($buscaSentimento, MYSQLI_ASSOC);
$arrayBuscaG = mysqli_fetch_all($buscaGenero, MYSQLI_ASSOC);


//print_r($buscaSentimento);
if(($arrayBuscaS == 1) && ($arrayBuscaG == 1)){
    echo "Música triste em um rock";
}else{
    echo "Não funcionou";
}
mysqli_close($conexao);



?>