
<?php
include("../../includes/permissao.php");
  include("../../includes/verificarLogin.php");
	include("../../includes/nav.php");
$conexao = mysqli_connect("localhost", "root", "", "bancofeelsmusic");

$busca = mysqli_query($conexao,"SELECT * FROM sentimento");

$arrSentimento = mysqli_fetch_all($busca, MYSQLI_ASSOC);

// $quantidade = mysqli_affected_rows($conexao);
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
      <h2>Sentimentos Cadastrados</h2>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>

          </tr>
        </thead>
        <?php
          foreach ($arrSentimento as $chave => $valor) {
            echo "<tr>";
            echo "<td>".$valor["nome"]."</td>";
            echo "<td>";
              echo "<a href='../../actions/alterarSentimento.php?codigo=".$valor["idsentimento"]."'>Editar</a>";
            echo "</td>";
            echo "<td>";
              echo "<a href='../../actions/excluirSentimento.php?codigo=".$valor["idsentimento"]."'>Excluir</a>";
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
