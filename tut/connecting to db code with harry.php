<?php
    echo "Welcome to connecting db";

    //  ways to connect
    // 1. mysqli extension
    // 2. PDO(php data objects)

    // connecting to db
    $servername = 'localhost';
    $username = "root";
    $password = "";

    //create a connection
    $con = mysqli_connect($servername, $username, $password);

    echo "<br> Connection was succesful"; 
?>