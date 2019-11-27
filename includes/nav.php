<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<html>
    <head>
        <style media="screen">
            body{
                background-color: #171717;
            }

            nav{
                background-color: #FC9F01;
              
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
        <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #FC9F01;">
            <a class="navbar-brand" href="../../pages/pages_adm/index_adm.php">Feels Music</a>
            <img src="../../assets/imgs/Icon.png" width="40" height="40">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                   <!-- <li class="nav-item active">
                        <a class="nav-link" href="#">Artistas <span class="sr-only">(Página atual)</span></a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="m_artistas.php">Artistas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="m_album.php">Álbum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="m_sentiment.php">Sentimento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="m_genero.php">Gênero</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="m_musica.php">Músicas</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Manutenções
                        </a>
                        <div class="dropdown-menu" >
                            <a class="dropdown-item" href="visualizarAlbum.php">Álbum</a>
                            <a class="dropdown-item" href="visualizarArtista.php">Artistas</a>
                            <a class="dropdown-item" href="visualizarSentimento.php">Sentimento</a>
                            <a class="dropdown-item" href="visualizarGenero.php">Gênero</a>
                            <a class="dropdown-item" href="manutencao.php">Usuários</a>
                            <!-- <a class="dropdown-item"href="http://localhost/feels-music/">Sair</a> -->
                              <!-- <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"> Sair -->
                            <!-- <img src="../../assets/imgs/Icon.png" width="30" height="30" class="d-inline-block align-top" alt=""> -->

                          </button>
                        </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="d-flex justify-content-between w-100">
              <div class="">
                <!-- <img src="../../assets/imgs/Icon.png" width="40" height="40" class="d-inline-block align-top" alt=""> -->
                <a class="navbar-brand" href="#">	</a>
              </div>
              <a href="http://localhost/feels-music/">
							<button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Sair
								<img src="../../assets/imgs/Icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
							</button>
            </a>
        </nav>
    </body>
</html>
