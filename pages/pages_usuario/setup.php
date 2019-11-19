<?php

$conexao = mysqli_connect("localhost","root","", "bancofeelsmusic");
mysqli_query($conexao, "UPDATE SENTIMENTO SET IDSENTIMENTO = ... WHERE IDUSUARIO = $codigo") or die(mysqli_error($conexao));


?>