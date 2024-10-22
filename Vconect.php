<meta charset= "UTF-8">
<?php
    $host  = "localhost:3306";
    $user  = "root";
    $pass  = "";
    $base  = "eventos";
    $conexao  = mysqli_connect($host, $user, $pass, $base);

    echo "<br>";
    echo "Conexao ok";

    mysqli_close($conexao);
?>