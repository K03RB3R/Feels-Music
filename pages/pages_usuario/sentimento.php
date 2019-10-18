<?php

$conexao = mysqli_connect("localhost","root","root","bancofeelsmusic");
$busca = mysqli_query($conexao,"SELECT * FROM sentimento");
$arrSentimento = mysqli_fetch_all($busca, MYSQLI_ASSOC);
mysqli_close($conexao);

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<html>
    <head>
    <title>Sentimentos - Feels Music</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    </head>
    <body>
   <!--  <form action="../assets/validacao_sentimento.php" method="get"> -->
      <div class="list-group">
                <a href="genero.php?id_sentimento=1" class="list-group-item list-group-item-action flex-column align-items-start" name="apaixonado">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Apaixonado</h5>
                    </div>
                    <p class="mb-1">Descrição sobre apaixonado.</p>
                </a>
                <a href="../../assets/includes/validacao_sentimento.php?cod=2" class="list-group-item list-group-item-action flex-column align-items-start" name="triste">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Triste</h5>
                    </div>
                    <p class="mb-1">Descrição sobre triste.</p>
                </a>
                <!-- <a href="genero.php" class="list-group-item list-group-item-action flex-column align-items-start" name="inspirado">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Inspirado</h5>
                    </div>
                    <p class="mb-1">Descrição sobre inspirado.</p>
                </a>
                <a href="genero.php" class="list-group-item list-group-item-action flex-column align-items-start" name="odio">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Com ódio</h5>
                    </div>
                    <p class="mb-1">Descrição sobre ódio.</p>
                </a>
                <a href="genero.php" class="list-group-item list-group-item-action flex-column align-items-start" name="nostalgia">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Nostalgia</h5>
                    </div>
                    <p class="mb-1">Descrição sobre nostalgia.</p>
                </a>
                <a href="genero.php" class="list-group-item list-group-item-action flex-column align-items-start" name="religiao">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Religiosidade</h5>
                    </div>
                    <p class="mb-1">Descrição sobre religiosidade.</p>
                </a>
                <a href="genero.php" class="list-group-item list-group-item-action flex-column align-items-start" name="vamodale">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">VAMO DALE</h5>
                    </div>
                    <p class="mb-1">DALE DALE DALE.</p>
                </a> -->
                <?php
                foreach($arrSentimento as $chave => $valor){
                    echo "<tr>";
                    echo "<td>";
                    echo "<a href='genero.php?codigo=".$valor["idsentimento"]."'>".$valor["nome"]."</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
        </div>
       <!-- </form> -->
    </body>
</html>
