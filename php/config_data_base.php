<?php
function connectDB(){
    $servername = "77.34.255.199:3306";
    $database = "apen";
    $username = "intuser";
    $password = "Googlego1!";

    $connect = mysqli_connect($servername, $username, $password, $database);
    mysqli_set_charset($connect, 'utf8');

    if (!$connect) {
        echo 'ты дурак? так не работает';
        die("Ошибка подключения: " . mysqli_connect_error());

    }
    else{
        return $connect;
    }



}

