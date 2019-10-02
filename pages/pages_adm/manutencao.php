<?php 
$conexao = mysqli_connect("localhost","root","root","bancofeelsmusic");
$query = mysqli_query($conexao,"SELECT * FROM usuario");
$arrFM = mysqli_fetch_all($query, MYSQLI_ASSOC);
mysqli_close($conexao);

?>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Data de nascimento</th>
      <th scope="col">E-mail</th>
      <th scope="col">Senha</th>
      <th scope="col">Nickname</th>
    </tr>
  </thead>
</table>
<tbody>
<?php

foreach ($arrFM as $key => $value){
    echo "<tr>";
        echo "<td>". $value["nome"] . "</td>";
        echo "<td>". $value["data_nascimento"] . "</td>";
        echo "<td>". $value["email"] . "</td>";
        echo "<td>". $value["senha"] . "</td>";
        echo "<td>". $value["nickname"] . "</td>";
    echo  "</tr><br>";
} 
?>
</tbody>