<?php
    $sentimento = $_GET["cod"];

    echo $sentimento;

    $_SESSION['id_categoria'] = $_GET["id_categoria"];

    //PAGINA GENERO

    $_SESSION['idgenero'] = $_GET['idgenero']

    $conexao = mysqli_connect("localhost", "root", "root", "bancofeelsmusic");
    $query = mysqli_query($conexao, "INSERT INTO sentimento (nome) VALUES('$sentimento') ") or die(mysqli_error($conexao));
    $quantidade = mysqli_affected_rows($conexao);

    $buscar = mysqli_query($conexao, "SELECT * FROM sentimento");

    $arrDados = mysqli_fetch_all($buscar, MYSQLI_ASSOC);
        //fechar Conexao
        mysqli_close($conexao);
        header('Location: index.php?pagina=criar&sucesso=1');
"SELECT * FROM musica WHERE id_categoria = $_SESSION['id_categoria'] and idgenero =$_SESSION['idgenero'] ";

//update 
?>