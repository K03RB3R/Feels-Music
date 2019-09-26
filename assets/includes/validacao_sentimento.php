<?php
        
if (isset($_POST["apaixonado"])) {
    $sentimento = $_POST["apaixonado"];
    

    $conexao = mysqli_connect("localhost", "root", "root", "bancofeelsmusic");
    $query = mysqli_query($conexao, "INSERT INTO tbl_orcamentos VALUES(DEFAULT, '$sentimento) ") or die(mysqli_error($conexao));
    $quantidade = mysqli_affected_rows($conexao);

    $buscar = mysqli_query($conexao, "SELECT * FROM sentimento");

    $arrDados = mysqli_fetch_all($buscar, MYSQLI_ASSOC);
        //fechar Conexao
        mysqli_close($conexao);
        header('Location: index.php?pagina=criar&sucesso=1');
}

//update 
?>