<link rel="stylesheet" href="../css/main.css">

<?php
include("../../includes/permissao.php");
  include("../../includes/verificarLogin.php");
include("../../includes/nav.php");
  $quantidade = 0;
  $conexao = mysqli_connect("localhost","root", "", "bancofeelsmusic");


if (isset($_POST["titulo"])){
   $titulo = $_POST["titulo"];
   $musica_idgenero = $_POST["musica_idgenero"];
   $album_idalbum = $_POST["album_idalbum"];
   $caminho = $_POST["caminho"];


   // teste //

    $destino= '../../assets/musics/';
    print_r($_FILES);
    $ext = strtolower(substr($_FILES['userfile']['name'],-4));
    if($ext==".mp3"||$ext==".wma"||$ext==".aac"||$ext==".ogg"){
    $new_name = $_FILES['userfile']['name'];
    $caminho="../../assets/musics/".$new_name;

    move_uploaded_file($_FILES['userfile']['tmp_name'], $caminho);
    $query =  mysqli_query($conexao, "INSERT INTO musica VALUES(DEFAULT, '$titulo', $musica_idgenero, $album_idalbum,'$caminho') ") or die (mysqli_error($conexao));
    }

  $quantidade = mysqli_affected_rows($conexao);

    mysqli_close($conexao);
    //Script que impede o refresh post
    echo "<script>history.pushState({}, '', '')</script>";
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <style media="screen">
    body{
      background-color: #171717;

    }
    h2{
    color: #FC9F01;
    }
    h4{
      color: #FC9F01;
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
    <!-- <nav class="navbar navbar-light" style="background-color: #FC9F01;">
      <a class="navbar-brand" href="#">
      <!-- <img src="../../assets/imgs/Icon.png" width="40" height="40" class="d-inline-block align-top" alt=""> -->


      </a>
    </nav>
  </head>
  <body>
    <center>
      <br>
      <h2>Músicas</h2>
      <table class="table table-bordered">
      </table>
    </center>

    <form enctype="multipart/form-data" action="m_musica.php" method="post">

     <h4>Selecione a música: <input name="userfile" type="file" /></h4>
      <!-- <input type="submit" value="Enviar arquivo" /> -->


      <br><br><br><br>
      <div class="col-auto">
        <label for="inlineFormImput" class="sr-only">Musica</label>
      <input type="text" class="form-control mb-2"  id="inlineFormImput" placeholder="Nome" name="titulo" required>
      </div>
      <div class="col-auto">
         <label for="inlineFormImput" class="sr-only">musica_idgenero</label>
         <select class="form-control mb-2" name="musica_idgenero"required>
           <option value="">Selecione o Gênero</option>

         <?php

         $musica_idgenero = "SELECT * FROM genero";
         $musica_idgenero = mysqli_query($conexao, $musica_idgenero);

         while ($row_musica_idgenero = mysqli_fetch_assoc($musica_idgenero) ) {
         ?>
           <option value="<?php echo $row_musica_idgenero['idgenero'];?>">
             <?php echo $row_musica_idgenero['nome'];?>
           </option>
         <?php
          }
          ?>
        </select>

      </div>
      <div class="col-auto">
        <label for="inlineFormImput" class="sr-only">album_idalbum</label>
           <select class="form-control mb-2" name="album_idalbum" required>
             <option value="">Selecione o Álbum</option>

           <?php

           $album_idalbum = "SELECT * FROM album";
           $album_idalbum = mysqli_query($conexao, $album_idalbum);

           while ($row_album_idalbum = mysqli_fetch_assoc($album_idalbum)) {
           ?>
             <option value="<?php echo $row_album_idalbum['idalbum'];?>">
               <?php echo $row_album_idalbum['nome'];?>
             </option>
           <?php
            }
            ?>

          </select>
          <button type="submit" style="background-color: #FC9F01;" class="btn warning mb-2">Cadastrar</button>

        </div

        <?php if ($quantidade >=1){ ?>
             <div class="alert alert-light alert-dismissible fade show" role="alert" >
               <strong>Música cadastrada com sucesso!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        <?php } ?>
      </form>


    </body>
    <footer class="fixar-rodape">
      Todos os direitos reservados à Feels Music INC - 2019
    </footer>
    </html>
