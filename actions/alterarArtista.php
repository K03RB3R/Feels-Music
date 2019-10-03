<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php

$codigo = $_GET["codigo"];
$conexao = mysqli_connect("localhost", "root", "", "bancofeelsmusic");

if (isset($_POST["nome"])) {
  $nome = $_POST["nome"];

  mysqli_query($conexao, "UPDATE artista SET nome = '$nome' WHERE idartista = $codigo");
  $alterou = mysqli_affected_rows($conexao);
  if ($alterou > 0) {
      header("Location:../pages/pages_adm/visualizarArtista.php");
      echo "<script>alert('Alterado com sucesso!')</script>";


    }
}

$busca = mysqli_query($conexao,"SELECT * FROM  artista WHERE idartista = $codigo") OR die(mysqli_error($conexao));
$arrArtista = mysqli_fetch_all($busca, MYSQLI_ASSOC);
mysqli_close($conexao);

 ?>
 <html>
   <head>
     <meta charset="utf-8">
   </head>
   <body>


       <form class="form-inline" method="post">
         <br><br><br>
         <div class="col-auto">
           <label class="sr-only" for="inlineFormInput">Nome</label>
             <input type="text" name="nome" class="form-control mb-2" id="inlineFormInput" placeholder="Nome" value="<?php echo $arrArtista[0]["nome"]; ?>"/>
             <input type="hidden" name="codigo" value="<?php echo $codigo; ?>"/>
         </div>
         <button type="submit" style="background-color: #FC9F01;" class="btn btn-warning mb-2">Editar Artista</button>

       </form>

   </body>
 </html>
