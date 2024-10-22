<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Eventos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="ver.css" rel="stylesheet">
</head>
<body>

<div class="body-content">

<?php
    $host  = "localhost:3306";
    $user  = "root";
    $pass  = "";
    $base  = "eventos";
    $conexao  = mysqli_connect($host, $user, $pass, $base);
    
    if (!$conexao) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    $resu = mysqli_query($conexao, "SELECT * FROM dados_eventos");
    
    echo "<div class='container mt-5'>";
    echo "<h1 class='text-center'>Tabela de Eventos</h1>";
    echo "<table class='table table-bordered table-striped mt-4'>";
    echo "<thead class='thead-dark'>
            <tr>
                <th>ID</th>
                <th>Nome do Evento</th>
                <th>Data do Evento</th>
                <th>Hora de Início</th>
                <th>Hora de Fim</th>
                <th>Descrição do Evento</th>
                <th>Local do Evento</th>
                <th>Responsável pelo Evento</th>
            </tr>
          </thead>
          <tbody>";

    while ($escrever = mysqli_fetch_array($resu)) {
        echo "<tr>
                <td>" . $escrever["id"] . "</td>
                <td>" . $escrever["nome_evento"] . "</td>
                <td>" . $escrever["data_evento"] . "</td>
                <td>" . $escrever["hora_inicio"] . "</td>
                <td>" . $escrever["hora_fim"] . "</td>
                <td>" . $escrever["descricao_evento"] . "</td>
                <td>" . $escrever["local_evento"] . "</td>
                <td>" . $escrever["responsavel_evento"] . "</td>
              </tr>";
    }

    echo "</tbody></table></div>";

    mysqli_close($conexao);
?>


<div class="text-center mt-4">
        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </div>
</div>

<footer class="bg-dark text-light text-center py-3 mt-5">
        <div class="container">
            <p class = "text_footer">&copy; 2024 Eventify. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>
</html>
