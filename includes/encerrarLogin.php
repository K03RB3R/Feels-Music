<?php
seesion_stast();
unset($_SESSION['`Nickname']);
unset($_SESSION['Senha']);
// unset($_SESSION['']);
session_destroy();
header("Location:includesecerrarLogin.php");
exit;

 ?>
