<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php

    $host  = "localhost:3306";
    $user  = "root";
    $pass  = "";
    $base  = "eventos";
    $conexao  = mysqli_connect($host, $user, $pass, $base);


    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id = $_POST["id"];
        $nome = $_POST["nome"]; 
        $data = $_POST["data"];
        $horai = $_POST["horai"];
        $horaf = $_POST["horaf"]; 
        $desc = $_POST["desc"];
        $loc = $_POST["loc"];
        $resp = $_POST["resp"];
        $input = mysqli_query($conexao, "INSERT INTO dados_eventos (id, nome_evento, data_evento, hora_inicio, hora_fim, descricao_evento, local_evento, responsavel_evento) VALUES ('$id' ,'$nome', '$data', '$horai' ,'$horaf', '$desc', '$loc' ,'$resp');");
        $resultadoQueryMySQL = mysqli_query($conexao, "select * from dados_eventos where id");
        echo
          "<center><table border=3px>
            <tr>
              <th>id</th>
              <th>nome_evento</th>
              <th>data_evento</th>
              <th>hora_inicio</th>
              <th>hora_fim</th>
              <th>descricao_evento</th>
              <th>local_evento</th>
              <th>responsavel_evento</th>
            </tr>";
        while ($escrever = mysqli_fetch_array($resultadoQueryMySQL)) {
          echo
          "</td><td>" . $escrever["id"] .
          "</td><td>" . $escrever["nome_evento"] .
          "</td><td>" . $escrever["data_evento"] .
          "</td><td>" . $escrever["hora_inicio"] .
          "</td><td>" . $escrever["hora_fim"] .
          "</td><td>" . $escrever["descricao_evento"] .
          "</td><td>" . $escrever["local_evento"] .
          "</td><td>" . $escrever["responsavel_evento"] . "</td></tr>";
        }
        echo "</table></center>";
        echo "</br></br>";  
      }
    mysqli_close($conexao);
?>