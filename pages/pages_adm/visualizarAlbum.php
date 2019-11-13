<?php
$conexao = mysqli_connect("localhost", "root", "", "bancofeelsmusic");

$busca = mysqli_query($conexao,"SELECT * FROM album");

$arrAlbum = mysqli_fetch_all($busca, MYSQLI_ASSOC);

mysqli_close($conexao);


?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <style media="screen">
   	 body{
   		 background-color: #171717;

   	 }
   	 h2,th{
   		 color: #FC9F01
   	 }
     td,a{
        color:#F2F2F2
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
    </style>
    <nav class="navbar navbar-light" style="background-color: #FC9F01;">
      <a class="navbar-brand" href="#">
        <img src="../../assets/imgs/Icon.png" width="40" height="40" class="d-inline-block align-top" alt="">
        Feels Music
      </a>
    </nav>
  </head>
  <body>
    <br>
    <center>
      <h2>Álbuns Cadastrados</h2>
      <table class="table table-bordered">
        <thead>
          <tr>

            <th><div scope="col" align="center">Álbum</div></th>
            <th><div scope="col" align="center">Ano</div></th>
            <th><div scope="col" align="center">Artista</div></th>
            <th><div scope="col" align="center">Editar</div></th>
            <th><div scope="col" align="center">Excluir</div></th>


          </tr>
        </thead>
        <?php
          foreach ($arrAlbum as $chave => $valor) {
            echo "<tr>";
            echo "<td>".$valor["nome"]."</td>";
            echo "<td>".$valor["ano_lancamento"]."</td>";
            echo "<td>".$valor["artista_idartista"]."</td>";
            echo "<td>";
            echo "<a href='../../actions/alterarAlbum.php?codigo=".$valor["idalbum"]."'>Editar</a>";
            echo "</td>";
            echo "<td>";
            echo "<a href='../../actions/excluirAlbum.php?codigo=".$valor["idalbum"]."'>Excluir</a>";
            echo "</td>";
            echo "</tr>";
          }
         ?>
      </table>
    </center>
  </body>
  <br>
  <footer class="fixar-rodape">
    Todos os direitos reservados à Feels Music INC - 2019
  </footer>
</html>
