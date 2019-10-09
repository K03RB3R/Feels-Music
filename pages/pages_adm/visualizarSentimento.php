<?php
$conexao = mysqli_connect("localhost", "root", "root", "bancofeelsmusic");
    
$busca = mysqli_query($conexao,"SELECT * FROM sentimento");

  $arrSentimento = mysqli_fetch_all($busca, MYSQLI_ASSOC);

	 $quantidade = mysqli_affected_rows($conexao);
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


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