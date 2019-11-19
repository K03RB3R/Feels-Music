

<?php include("../../includes/nav.php");?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    
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
