<?php

    $connection = mysqli_connect('localhost', 'root');
    mysqli_select_db($connection, 'company');

    $x = $_GET['param'];
    $query1 = "DELETE FROM `employee` WHERE e_id = $x";

    mysqli_query($connection, $query1);

    header('location:http://localhost/Spryker/Assignments/Assignment%201/show_data.php?');
?>