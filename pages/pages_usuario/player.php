<?php
session_start();
if(isset($_GET["codigo"])){
    $genero = $_GET["codigo"];
    $conexao = mysqli_connect("localhost","root","", "bancofeelsmusic");

    $buscaMusica = mysqli_query($conexao, "SELECT * FROM musica WHERE musica_idgenero = $genero") or die(mysqli_error($conexao));
    $arrayBuscaM = mysqli_fetch_all($buscaMusica, MYSQLI_ASSOC);


    $variaveisScript = "<script>var songs = [";
    $cont = 0;
    foreach($arrayBuscaM as $key=>$value){
        $variaveisScript .= "'".$value["caminho"]."'";
       // echo count($arrayBuscaM);
        
        $cont++;
     //   echo $cont;
        if($cont < count($arrayBuscaM)){
            $variaveisScript .= ",";
        }
       
    }
    $variaveisScript .= "]; ";
    $variaveisScript .= "var titulos = [";
    $cont = 0;
    foreach($arrayBuscaM as $key=>$value){
        $variaveisScript .= "'".$value["titulo"]."'";
      //  echo count($arrayBuscaM);
        
        $cont++;
       // echo $cont;
        if($cont < count($arrayBuscaM)){
            $variaveisScript .= ",";
        }
       
    }

    $variaveisScript .= "] </script>";
    echo $variaveisScript;
}

?>
<?php
    include("../../actions/selecaoMusica.php");
?>

<html>
    <head>
        <link href="../../css/mp3.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body style="background-color:  #171717;">
      


        <div id="main">
            <div id="image">
                <img src="../../assets/imgs/poster.png"/>
            </div>
            <div id="player">
                <div id="songTitle">titulo</div>
                <div id="buttons">
                    <button id="pre" onclick="pre()"><img src="../../assets/imgs/Pre.png" height="90%" width="90%"/></button>
                    <button id="play" onclick="playOrPauseSong()"><img src="../../assets/imgs/Play.png"/></button>
                    <button id="next" onclick="next()"><img src="../../assets/imgs/Next.png" height="90%" width="90%"/></button>
                </div>

                <div id="seek-bar">
                    <div id="fill"></div>
                    <div id="handle"></div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">

        var poster = ["../../assets/imgs/poster.png","../../assets/imgs/poster.png"];
        
        var songTitle = document.getElementById("songTitle");
        var fillBar = document.getElementById("fill");

        var song = new Audio();
        var currentSong = 0;    
        
        $(document).ready(function(){
            playSong();


        })

        
        function playSong(){

            song.src = songs[currentSong];

            songTitle.textContent = titulos[currentSong];

            song.play();
        }

        function playOrPauseSong(){

            if(song.paused){
                song.play();
                $("#play img").attr("src","../../assets/imgs/Pause.png");
            }
            else{
                song.pause();
                $("#play img").attr("src","../../assets/imgs/Play.png");
            }
        }

        song.addEventListener('timeupdate',function(){

            var position = song.currentTime / song.duration;

            fillBar.style.width = position * 100 +'%';
        });


        function next(){

            currentSong++;
            if(currentSong > 2){
                currentSong = 0;
            }
            playSong();
            $("#play img").attr("src","../../assets/imgs/Pause.png");
            $("#image img").attr("src",poster[currentSong]);
            $("#bg img").attr("src",poster[currentSong]);
        }

        function pre(){

            currentSong--;
            if(currentSong < 0){
                currentSong = 2;
            }
            playSong();
            $("#play img").attr("src","../../assets/imgs/Pause.png");
            $("#image img").attr("src",poster[currentSong]);
            $("#bg img").attr("src",poster[currentSong]);
        }

    </script>

</html>
