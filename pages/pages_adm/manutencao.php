
<?php
include("../../includes/permissao.php");
  include("../../includes/verificarLogin.php");
include("../../includes/nav.php");?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
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
                echo "<td>". utf8_encode($value["nome"]) . "</td>";
                echo "<td>". date('d/m/Y',strtotime($value["data_nascimento"])) . "</td>";
                echo "<td>". $value["email"] . "</td>";
                echo "<td>". $value["senha"] . "</td>";
                echo "<td>". $value["nickname"] . "</td>";
                echo "<td><a href='../pages_usuario/cadastro.php?id=".$value['idusuario']."'>Editar</a></td>";
                echo "<td><a href='../pages_usuario/cadastro.php?id=".$value['idusuario']."&excluir=true'>Excluir</button></td>";
            echo  "</tr>";
        }
        ?>

        <?php

        ?>
       </table>
      </center>
  </body>
  <br>
 <footer class="fixar-rodape">
  Todos os direitos reservados à Feels Music INC - 2019
 </footer>
</html>
