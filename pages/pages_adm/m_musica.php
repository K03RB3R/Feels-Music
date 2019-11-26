<link rel="stylesheet" href="../css/main.css">

<?php
include("../../includes/nav.php");
  $quantidade = 0;
  $conexao = mysqli_connect("localhost","root", "", "bancofeelsmusic");


if (isset($_POST["titulo"])){
   $titulo = $_POST["titulo"];
   $musica_idgenero = $_POST["musica_idgenero"];
   $album_idalbum = $_POST["album_idalbum"];


  $query =  mysqli_query($conexao, "INSERT INTO musica VALUES(DEFAULT, '$titulo', $musica_idgenero, $album_idalbum) ") or die (mysqli_error($conexao));

  $quantidade = mysqli_affected_rows($conexao);

    mysqli_close($conexao);
    //Script que impede o refresh post
    echo "<script>history.pushState({}, '', '')</script>";
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    
  </head>
  <body>
     <br>
     <!-- O tipo de encoding de dados, enctype, DEVE ser especificado abaixo -->
     <form enctype="multipart/form-data" action="../pages_adm/m_musica.php" method="POST">
     <!-- MAX_FILE_SIZE deve preceder o campo input -->
     <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
     <!-- O Nome do elemento input determina o nome da array $_FILES -->
     Selecione o arquivo MP3: <input name="userfile" type="file" />
     <input type="submit" value="Enviar arquivo" />
     </form>

    <form class="form-inline" method="post">
      <br><br><br><br>
      <div class="col-auto">
        <label for="inlineFormImput" class="sr-only">Musica</label>
      <input type="text" class="form-control mb-2"  id="inlineFormImput" placeholder="Nome" name="titulo" required>
      </div>
      <div class="col-auto">
         <label for="inlineFormImput" class="sr-only">musica_idgenero</label>
         <select name="musica_idgenero">
           <option>Selecione o Gênero</option>

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
           <select name="album_idalbum">
             <option>Selecione o Album</option>

           <?php

           $album_idalbum = "SELECT * FROM album";
           $album_idalbum = mysqli_query($conexao, $album_idalbum);

           while ($row_album_idalbum = mysqli_fetch_assoc($album_idalbum) ) {
           ?>
             <option value="<?php echo $row_album_idalbum['idalbum'];?>">
               <?php echo $row_album_idalbum['nome'];?>
             </option>
           <?php
            }
            ?>

          </select>
          <button type="submit" style="background-color: #FC9F01;" class="btn warning mb-2">Cadastrar Música</button>

        </div

        <?php if ($quantidade >=1){ ?>
             <div class="alert alert-light alert-dismissible fade show" role="alert">
               <strong>Gênero cadastrado com sucesso!</strong>
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
