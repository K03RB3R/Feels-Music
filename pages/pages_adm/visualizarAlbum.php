
<?php
include("../../includes/permissao.php");
  include("../../includes/verificarLogin.php");
	include("../../includes/nav.php");
$conexao = mysqli_connect("localhost", "root", "", "bancofeelsmusic");


$sql = "SELECT al.*, ar.nome as NomeArt
        FROM album al
        INNER JOIN artista ar
        ON ar.idartista = al.artista_idartista";

$busca = mysqli_query($conexao,$sql);

$arrAlbum = mysqli_fetch_all($busca, MYSQLI_ASSOC);

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
            echo "<td>".utf8_encode($valor["nome"])."</td>";
            echo "<td>".date('d/m/Y',strtotime($valor["ano_lancamento"]))."</td>";
            echo "<td>".utf8_encode($valor["NomeArt"])."</td>";
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
