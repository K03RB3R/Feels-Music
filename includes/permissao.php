<?php
session_start();
if($_SESSION['id_tipo'] != 2){
  header('location: ../pages_usuario/sentimento.php');
}

 ?>
