<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php

$conexao = mysqli_connect("localhost", "root", "", "bancofeelsmusic");

$busca = mysqli_query($conexao, "SELECT * FROM artista");

$arrArtista = mysqli_fetch_all($busca, MYSQLI_ASSOC);

mysqli_close($conexao);


 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <br><br><br>
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
</html>
