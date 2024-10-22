<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Evento</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="excluir.css" rel="stylesheet"> <!-- Inclua seu CSS aqui -->
</head>
<body>


<div class="body-content">
<div class="container mt-5">
    <h1 class="text-center mb-4">Excluir Evento</h1>
    <form method="POST" class="mb-5">
        <div class="form-group">
            <label for="id">Código do evento (ID):</label>
            <input type="text" class="form-control" name="id" required />
        </div>
        <button type="submit" class="btn btn-danger">Excluir</button>
    </form>

    <?php
    $host = "localhost:3306";
    $user = "root";
    $pass = "";
    $base = "eventos";
    $conexao = mysqli_connect($host, $user, $pass, $base);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id = $_POST["id"];

        $resultadoQueryMySQL = mysqli_query($conexao, "DELETE FROM dados_eventos WHERE id = '$id'");

        if ($resultadoQueryMySQL) {
            echo "<div class='alert alert-success text-center'>Evento excluído com sucesso!</div>";
        } else {
            echo "<div class='alert alert-danger text-center'>Erro ao excluir o evento!</div>";
        }
    }

    $resu = mysqli_query($conexao, "SELECT * FROM dados_eventos");
    echo "<h1 class='text-center'>Tabela de Eventos</h1>";
    echo "<table class='table table-bordered mt-4'>
            <thead class='thead-dark'>
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
    echo "</tbody></table>";

    mysqli_close($conexao);
    ?>
</div>
</div>

<div class="text-center mt-4">
        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </div>
    
<footer class="bg-dark text-light text-center py-3 mt-5">
        <div class="container">
            <p class = "text_footer">&copy; 2024 Eventify. Todos os direitos reservados.</p>
        </div>
    </footer>


</body>
</html>
