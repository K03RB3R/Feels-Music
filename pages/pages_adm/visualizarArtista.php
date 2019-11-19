

<?php
	include("../../includes/nav.php");
$conexao = mysqli_connect("localhost", "root", "", "bancofeelsmusic");

$busca = mysqli_query($conexao, "SELECT * FROM artista");

$arrArtista = mysqli_fetch_all($busca, MYSQLI_ASSOC);

mysqli_close($conexao);

 ?>

<!DOCTYPE html>
<html>
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
    
  </head>
  <body>
    <br>
    <center>
      <h2>Artistas Cadastrados</h2>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Editar Artista</th>
            <th scope="col">Excluir Artista</th>
          </tr>
        </thead>
        <?php
          foreach ($arrArtista as $chave => $valor) {
            echo "<tr>";
            echo "<td>".$valor["nome"]."</td>";
            echo "<td>";
              echo "<a href='../../actions/alterarArtista.php?codigo=".$valor["idartista"]."'>Editar</a>";
            echo "</td>";
            echo "<td>";
              echo "<a href='../../actions/excluirArtista.php?codigo=".$valor["idartista"]."'>Excluir</a>";
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
