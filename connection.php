<?php

    // connecting to db
    $servername = 'localhost';
    $username = "root";
    $password = "";
    $database_name = "dbtrailmine";

    //create a connection
    $con = mysqli_connect($servername, $username, $password, $database_name);
    
    // die if connection was not succesful
    if(!$con){
        die("Sorry we to fail connect".mysqli_connect_error());
    }
    // echo "<br> Connection was succesful <br>"; 
    
?>