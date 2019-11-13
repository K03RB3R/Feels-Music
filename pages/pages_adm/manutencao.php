<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
      <h2>Usuários Cadastrados</h2>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Data de nascimento</th>
            <th scope="col">E-mail</th>
            <th scope="col">Senha</th>
            <th scope="col">Nickname</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>

          </tr>
        </thead>

        <?php
          $conexao = mysqli_connect("localhost","root","","bancofeelsmusic");
          $query = mysqli_query($conexao,"SELECT * FROM usuario");
          $arrFM = mysqli_fetch_all($query, MYSQLI_ASSOC);
          mysqli_close($conexao);

        ?>
        <?php
        foreach ($arrFM as $key => $value){
            echo "<tr>";
                echo "<td>". $value["nome"] . "</td>";
                echo "<td>". $value["data_nascimento"] . "</td>";
                echo "<td>". $value["email"] . "</td>";
                echo "<td>". $value["senha"] . "</td>";
                echo "<td>". $value["nickname"] . "</td>";
                echo "<td><a href='../pages_usuario/cadastro.php?id=".$value['idusuario']."'>Editar</a></td>";
                echo "<td><a href='../pages_usuario/cadastro.php?id=".$value['idusuario']."&excluir=true'>Excluir</button></td>";
            echo  "</tr><br>";
        }
        ?>

        <?php
          // $codigo = isset($_GET["codigo"]) ? $_GET["codigo"] : "";
          // $conexao = mysqli_connect("localhost","root","", "bancofeelsmusic");

          // if(isset($_POST["nome"])){
          //     $nome = $_POST["nome"];
          //     $dataNasc = $_POST["data_nascimento"];
          //     $email = $_POST["email"];
          //     $senha = $_POST["senha"];
          //     $nickname = $_POST["nickname"];

          //     mysqli_query($conexao, "UPDATE USUARIO SET NOME = '$nome',DATA_NASCIMENTO = $dataNasc, EMAIL='$email',SENHA='$senha',NICKNAME='$nickname' WHERE TIPO_USUARIO_IDTIPO_USUARIO1 = $codigo") or die(mysqli_error($conexao));
          //     $alterou = mysqli_affected_rows($conexao);
          //     if($alterou > 0){
          //         echo "<script>alert('Alterado com sucesso!')</script>";
          //     }
          // }
          // $busca = mysqli_query($conexao, "SELECT * FROM USUARIO WHERE TIPO_USUARIO_IDTIPO_USUARIO1 = $codigo") or die(mysqli_error($conexao));
          // $arrFM = mysqli_fetch_all($busca, MYSQLI_ASSOC);


          // mysqli_close($conexao);


        ?>
       </table>
      </center>
  </body>
  <br>
 <footer class="fixar-rodape">
  Todos os direitos reservados à Feels Music INC - 2019
 </footer>
</html>
