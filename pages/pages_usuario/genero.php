<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/main.css">

<?php


//session_start();

//if (isset($_GET['codigo'])){
//  $_SESSION['sentimento'] = $_GET['codigo'];
//  header ('location:genero.php');
//}else{
//  header ('location:sentimento.php');
//}
     
//echo $_SESSION['sentimento'];



$conexao = mysqli_connect("localhost","root","","bancofeelsmusic");
$busca = mysqli_query($conexao,"SELECT * FROM genero");
$arrGenero = mysqli_fetch_all($busca, MYSQLI_ASSOC);
mysqli_close($conexao);


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <style media="screen">
    body{
      background-color: #171717;
    }
    footer.fixar-rodape{
       border-top: 1px solid #333;
       bottom: 0;
       left: 0;
       height: 30px;
       position: fixed;
       width: 100%;
       background: #171717;
       color: #ffffff;
     }
     .linhaGenero{
        background: #171717;
        color: #0D0D0D;
        border: #FC9F01;
        cursor: pointer;
        border: 1px solid #FC9F01;
        border-radius: 20px;
        height: 50px;
        width: 360px;
        text-align: center;


     }
     .linhaGenero:hover, a:hover{
        background: #0D0D0D;
        color: #FC9F01;
        text-decoration: none;

     }

      a{
        color: #FC9F01;
    text-align: center;
    font-size: 25px;

      }
      h2{
        color: #FC9F01;
      }
      }

    </style>
    <nav class="navbar navbar-light" style="background-color: #FC9F01;">
      <a class="navbar-brand" href="#">
      <img src="../../assets/imgs/Icon.png" width="40" height="40" class="d-inline-block align-top" alt="">
      Feels Music
      <a href="http://localhost/feels-music/includes/encerrarLogin.php">
        <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Sair
          <img src="../../assets/imgs/Icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
        </button>
      </a>
    </nav>
  </head>
  <body>
    <br><br>
    <h2><center>Qual é o seu gênero musical preferido?</center></h2>
    <br><br>
    <?php
    foreach($arrGenero as $chave => $valor){
        echo "<div class='mx-auto linhaGenero'>";
        echo "<a href='player.php?codigo=".$valor["idgenero"]."'>".$valor["nome"]."</a>";
        echo "</div></br>";
    }
    ?>
    <script>
    $(".linhaGenero").click(function(){
      this.children[0].click();

    })

</script>
  </body>
  </br></br>
  <footer class="fixar-rodape">
    Todos os direitos reservados à Feels Music INC - 2019
  </footer>
</html>
