<?php

function getConnection() {
    $host = 'localhost';      
    $user = 'root';           
    $password = '';           
    $database = 'venda_carros';  

    $link = mysqli_connect($host, $user, $password, $database);

    if (!$link) {
        die("Erro na conexão: " . mysqli_connect_error());
    }

    return $link;
}
?>
