<?php
session_start();

 function SetarSentimento()
    {
        if (isset($_GET['id_sentimento'])){
            $_SESSION['sentimento'] = $_GET['id_sentimento'];
        }else{
            header ('location:sentimento.php');
        }

    }

SetarSentimento();

echo $_SESSION['sentimento'];


?>
