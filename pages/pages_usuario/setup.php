<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
/*$("document").ready(function(){
    
    $("#btnReq").click(function(){
        $.ajax({
            url: "resposta.php",
            type: "post",
            data: {
                nome: 'roberto',
                idade: '21'
            }
        })
        .done(function(msg){
            var objUsuario = JSON.parse(msg);
            //alert(msg);
            $("span").html(objUsuario.nome);
        })
        .fail(function(jqXHR, textstatus, msg){
            alert(msg);
        })
    });

});

</script>
</head>
<body>

<!-- <input type="button" id="btnReq" value="Requisição"> -->
<span></span>

</body>
</html>