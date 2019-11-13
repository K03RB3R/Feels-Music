<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$("document").ready(function(){
    
    $("#btnReq").click(function(){
        $.ajax({
            url: "m_sentiment.php",
            type: "post",
            data: {
                sentimento: 'sentimento',
            }
        })
        .done(function(msg){
            var objUsuario = JSON.parse(msg);
            alert(msg);
            $("span").html(objUsuario.sentimento);
        })
        .fail(function(jqXHR, textstatus, msg){
            alert(msg);
        })
    });

});

</script>
</head>
<body>

 <input type="button" id="btnReq" value="Feels Music"> 
<span></span>

</body>
</html>