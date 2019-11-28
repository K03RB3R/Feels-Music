<?php

  if(!isset($_SESSION['login']) && !isset($_SESSION['senha'])){
    header("location: http://localhost/feels-music/");
  }

 ?>
