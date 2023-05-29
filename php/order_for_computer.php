<?php
include 'config_data_base.php';


if (isset($_POST["name"])) {
    
    //Вставляем данные, подставляя их в запрос

    $sql = "INSERT INTO order_for_pc (name, phone, comment, massage, name_pc) VALUES ('{$_POST['name']}', '{$_POST['phone']}', '{$_POST['comment']}', '{$_POST['massage']}','{$_POST['name_pc']}')";
    if(mysqli_query(connectDB(), $sql)){
        echo "Ваша заявка принята";
    } else{
        echo "ERROR: Не удалось выполнить $sql. " . mysqli_error(connectDB());
    }

}
