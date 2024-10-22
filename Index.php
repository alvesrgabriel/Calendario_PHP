<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compromissos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">  
</head>
<body class="bg-light">

    <div class="body-content">
        <div class="container mt-5">
            <center><h1 class="mb-4">Agenda de Compromissos</h1></center>
            <div class="row justify-content-center">
                <?php
                echo "<div class='col-md-4 mb-4'> 
                        <div class='card text-center'> 
                            <div class='card-body'> 
                                <h5 class='card-title'><a href='cadastrar.php' class='card-link'>Cadastrar Evento</a></h5>
                                <h6> Adicione um evento novo aqui </h6> 
                            </div> 
                        </div> 
                      </div>";
                echo "<div class='col-md-4 mb-4'> 
                        <div class='card text-center'> 
                            <div class='card-body'> 
                                <h5 class='card-title'><a href='Exdadoseve.php' class='card-link'>Ver Eventos</a></h5> 
                                <h6> Veja aqui seus eventos cadastrados </h6> 
                            </div> 
                        </div> 
                      </div>";
                echo "<div class='col-md-4 mb-4'> 
                        <div class='card text-center'> 
                            <div class='card-body'> 
                                <h5 class='card-title'><a href='form_consultarDados.php' class='card-link'>Procurar Evento</a></h5> 
                                <h6> Busque aqui seus eventos cadastrados </h6> 
                            </div> 
                        </div> 
                      </div>";
                echo "<div class='col-md-4 mb-4'> 
                        <div class='card text-center'> 
                            <div class='card-body'> 
                                <h5 class='card-title'><a href='alterar.php' class='card-link'>Alterar Evento</a></h5> 
                                <h6> Altere aqui um evento já cadastrado </h6> 
                            </div> 
                        </div> 
                      </div>";
                echo "<div class='col-md-4 mb-4'> 
                        <div class='card text-center'> 
                            <div class='card-body'> 
                                <h5 class='card-title'><a href='excluir.php' class='card-link'>Excluir Evento</a></h5> 
                                <h6> Exclua aqui um evento já cadastrado </h6> 
                            </div> 
                        </div> 
                      </div>";
                ?>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-light text-center py-3 mt-5">
        <div class="container">
            <p class = "text_footer">&copy; 2024 Eventify. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>
</html>
