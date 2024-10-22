<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="cadastrar.css"> 
    <title>Cadastro de Evento</title>
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h1 class="text-center mb-4">Insira os Dados de Cadastro</h1>
        <form action="" method="POST" class="bg-white p-4 rounded shadow">
            <fieldset>
                <div class="form-group mb-3">
                    <label for="id">Código do evento (ID):</label>
                    <input type="text" class="form-control" name="id" placeholder="Ex: 123" required/>
                </div>
                <div class="form-group mb-3">
                    <label for="nome">Nome do evento:</label>
                    <input type="text" class="form-control" name="nome" placeholder="Nome do evento" required/>
                </div>
                <div class="form-group mb-3">
                    <label for="data">Data do evento:</label>
                    <input type="date" class="form-control" name="data" required/>
                </div>
                <div class="form-group mb-3">
                    <label for="horai">Hora de início do evento:</label>
                    <input type="time" class="form-control" name="horai" required/>
                </div>
                <div class="form-group mb-3">
                    <label for="horaf">Hora de fim do evento:</label>
                    <input type="time" class="form-control" name="horaf" required/>
                </div>
                <div class="form-group mb-3">
                    <label for="desc">Descrição do evento:</label>
                    <input type="text" class="form-control" name="desc" placeholder="Descrição breve" required/>
                </div>
                <div class="form-group mb-3">
                    <label for="loc">Local do evento:</label>
                    <input type="text" class="form-control" name="loc" placeholder="Local do evento" required/>
                </div>
                <div class="form-group mb-3">
                    <label for="resp">Responsável pelo evento:</label>
                    <input type="text" class="form-control" name="resp" placeholder="Nome do responsável" required/>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Enviar</button>
            </fieldset>
        </form>

        <div class="mt-5">
            <h2 class="text-center mb-4">Eventos Cadastrados</h2>
            <div class="card">
                <div class="card-body">
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

                       
                        mysqli_query($conexao, "INSERT INTO dados_eventos (id, nome_evento, data_evento, hora_inicio, hora_fim, descricao_evento, local_evento, responsavel_evento) VALUES ('$id', '$nome', '$data', '$horai', '$horaf', '$desc', '$loc', '$resp');");
                    }

                    
                    $resultadoQueryMySQL = mysqli_query($conexao, "SELECT * FROM dados_eventos");
                    echo "<table class='table table-striped'>";
                    echo "<thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome do Evento</th>
                                <th>Data</th>
                                <th>Hora Início</th>
                                <th>Hora Fim</th>
                                <th>Descrição</th>
                                <th>Local</th>
                                <th>Responsável</th>
                            </tr>
                          </thead>";
                    echo "<tbody>";
                    while ($escrever = mysqli_fetch_array($resultadoQueryMySQL)) {
                        echo "<tr>
                                <td>{$escrever['id']}</td>
                                <td>{$escrever['nome_evento']}</td>
                                <td>{$escrever['data_evento']}</td>
                                <td>{$escrever['hora_inicio']}</td>
                                <td>{$escrever['hora_fim']}</td>
                                <td>{$escrever['descricao_evento']}</td>
                                <td>{$escrever['local_evento']}</td>
                                <td>{$escrever['responsavel_evento']}</td>
                              </tr>";
                    }
                    echo "</tbody></table>";

                    mysqli_close($conexao);
                    ?>

                </div>
            </div>
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
