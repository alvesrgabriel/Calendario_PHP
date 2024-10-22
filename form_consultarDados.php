<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Eventos</title>
    <!-- Incluindo Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incluindo seu CSS personalizado -->
    <link href="consultar.css" rel="stylesheet">
</head>
<body>

<div class="body-content">
    <div class="container mt-5">
        <h1>Consultar Evento por ID</h1>
        <form action="" method="POST" class="mb-4">
            <label for="id">Insira o ID do evento:</label>
            <input type="text" name="id" class="form-control" required/>
            <input type="submit" value="Consultar" class="btn btn-primary"/>
        </form>

        <?php
            $host  = "localhost:3306";
            $user  = "root";
            $pass  = "";
            $base  = "eventos";
            $conexao  = mysqli_connect($host, $user, $pass, $base);

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $id = mysqli_real_escape_string($conexao, $_POST["id"]);
                $resultadoQueryMySQL = mysqli_query($conexao, "SELECT * FROM dados_eventos WHERE id = '$id'");

                if (mysqli_num_rows($resultadoQueryMySQL) > 0) {
                    echo "<table class='table table-bordered table-striped'>";
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

                    while ($escrever = mysqli_fetch_array($resultadoQueryMySQL)) {
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
                    echo "<div class='alert alert-warning'>Nenhum evento encontrado com o ID informado.</div>";
                }
            }

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
