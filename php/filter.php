<?php
    include '../php/config_data_base.php';
    $connect = connectDB();
    $query = mysqli_query($connect, "SELECT * FROM filter_title");



