<?php

    //  ways to connect
    // 1. mysqli extension
    // 2. PDO(php data objects)

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
    echo "<br> Connection was succesful"; 

    // create a db
    // $sql = "CREATE DATABASE dbtrailmine";
    // $result =  mysqli_query($con, $sql);

    // if ($result) {
    //     echo "The db was created successfully";
    // }
    // else{
    //     echo "The db wasn't created successfully -->" . mysqli_error($con);
    // }
    
    // Creating a SIGNUP_DETAILS Table
    // $signup = "CREATE TABLE `SIGNUP_DETAILS`(`SNO` INT(4) NOT NULL AUTO_INCREMENT, `FNAME` VARCHAR(12) NOT NULL, `LNAME` VARCHAR(12) NOT NULL, `EMAIL` VARCHAR(100) NOT NULL, PRIMARY KEY(`SNO`, `EMAIL`), `PASSWORD` VARCHAR(100) NOT NULL, `C_PASSWORD` VARCHAR(100) NOT NULL)";

    // $result = mysqli_query($con ,$signup);

    // Checking for table creation success
    // if ($result) {
    //         echo "<br>The Table was created successfully";
    // }
    // else{
    //     echo "The Table wasn't created successfully -->" . mysqli_error($con);
    // }


    // Creating a CONTACTUS_DETAILS Table
    // $contactus = "CREATE TABLE `CONTACTUS_DETAILS`(`SNO` INT(4) NOT NULL AUTO_INCREMENT, `FNAME` VARCHAR(12) NOT NULL, `LNAME` VARCHAR(12) NOT NULL, `EMAIL` VARCHAR(100) NOT NULL, PRIMARY KEY(`SNO`, `EMAIL`), `MESSAGE` VARCHAR(100) NOT NULL )";

    // $result = mysqli_query($con ,$contactus);

    // Checking for table creation success
    // if ($result) {
    //         echo "<br>The Table was created successfully";
    // }
    // else{
    //     echo "The Table wasn't created successfully -->" . mysqli_error($con);
    // }
    


?>