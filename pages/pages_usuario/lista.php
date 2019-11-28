<?php
session_start();
  include("../../includes/verificarLogin.php");
$id_genero =  $_GET['id_genero'];
$id_sentimento = $_SESSION['id_sentimento'];

echo "SELECT * FROM musica WHERE id_sentimento = $id_sentimento and idgenero =$id_genero ";

?>
