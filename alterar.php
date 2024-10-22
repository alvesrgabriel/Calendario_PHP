<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Evento</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="atualizar.css" rel="stylesheet"> 
</head>
<body>

<div class="body-content">
<div class="container mt-5">
    <h1 class="text-center mb-4">Alterar Evento</h1>
    <form action="" method="POST" class="mb-5">
        <div class="form-group">
            <label for="id">Código do evento (ID):</label>
            <input type="text" class="form-control" name="id" required />
        </div>

        <h2>O que você quer mudar?</h2>
        <div class="form-group">
            <label for="nome">Nome do evento:</label>
            <input type="text" class="form-control" name="nome" required />
        </div>

        <div class="form-group">
            <label for="data">Data do evento:</label>
            <input type="date" class="form-control" name="data" required />
        </div>

        <div class="form-group">
            <label for="horai">Hora de início do evento:</label>
            <input type="time" class="form-control" name="horai" required />
        </div>

        <div class="form-group">
            <label for="horaf">Hora de fim do evento:</label>
            <input type="time" class="form-control" name="horaf" required />
        </div>

        <div class="form-group">
            <label for="desc">Descrição do evento:</label>
            <input type="text" class="form-control" name="desc" required />
        </div>

        <div class="form-group">
            <label for="loc">Local do evento:</label>
            <input type="text" class="form-control" name="loc" required />
        </div>

        <div class="form-group">
            <label for="resp">Responsável pelo evento:</label>
            <input type="text" class="form-control" name="resp" required />
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <?php
    $host = "localhost:3306";
    $user = "root";
    $pass = "";
    $base = "eventos";
    $conexao = mysqli_connect($host, $user, $pass, $base);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $data = $_POST["data"];
        $horai = $_POST["horai"];
        $horaf = $_POST["horaf"];
        $desc = $_POST["desc"];
        $loc = $_POST["loc"];
        $resp = $_POST["resp"];

        $resultadoQueryMySQL = mysqli_query($conexao, "UPDATE dados_eventos SET nome_evento = '$nome', data_evento = '$data', hora_inicio = '$horai', hora_fim = '$horaf', descricao_evento = '$desc', local_evento = '$loc', responsavel_evento = '$resp' WHERE id = '$id'");

        if ($resultadoQueryMySQL) {
            echo "<div class='alert alert-success text-center' role='alert'>Alterações feitas com sucesso!</div>";
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

            $resultadoConsulta = mysqli_query($conexao, "SELECT * FROM dados_eventos WHERE id = '$id'");
            while ($escrever = mysqli_fetch_array($resultadoConsulta)) {
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
        } else {
            echo "<div class='alert alert-danger text-center' role='alert'>Erro ao atualizar os dados!</div>";
        }
    }

    // Exibir a tabela de eventos atual
    $resu = mysqli_query($conexao, "SELECT * FROM dados_eventos");
    echo "<h1 class='text-center'>Tabela de Eventos</h1>";
    echo "<table class='table table-bordered'>
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

    <!-- Botão "Voltar" -->
    <div class="text-center mt-4">
        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </div>
</div>
</div>

<footer class="bg-dark text-light text-center py-3 mt-5">
    <div class="container">
        <p class="text_footer">&copy; 2024 Eventify. Todos os direitos reservados.</p>
    </div>
</footer>

</body>
</html>
