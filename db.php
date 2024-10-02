<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "projeto";

    if ($conn = mysqli_connect($host, $user, $password, $database)){
        echo "Conectado com sucesso";
    } else{
        echo "Erro ao conectar";
    }