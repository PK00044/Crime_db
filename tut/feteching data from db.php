<?php
$servername = 'localhost';
    $username = "root";
    $password = "";
    $database_name = "dbtrailmine";

    //create a connection
    $con = mysqli_connect($servername, $username, $password, $database_name);

    // die if connection was not successful
    if(!$con){
        die("Sorry we failed to connect: " . mysqli_connect_error());
    }
    else{
        echo "<br> Connection was successful <br>"; 
    }
    
    // Feteching data from the table
    $sql = "SELECT * FROM `contactus_details`";
    $result =  mysqli_query($con, $sql);

    // find the number of records returned
    $num_rows = mysqli_num_rows($result);
    $num_fields = mysqli_num_fields($result);
    
    echo $num_fields .  "<br>" . $num_rows;

    // Display the rows returned by the SQL query
    if($num_rows > 0){
        while($row = mysqli_fetch_assoc($result)){
            // echo var_dump($row);
            // echo "<br>";
            // echo "<br>";
            
            echo $row['SNO'] . " Hello " . $row['FNAME'] . " tq for ".$row['MESSAGE'];
            echo "<br>";
            echo "<br>";

            $row = mysqli_fetch_assoc($result);
        }
    }

    // Usage of WHERE Clause to update data
    $sql = "UPDATE `contactus_details` SET `MESSAGE` = 'Updated record' WHERE   `EMAIL` = 'vdjkvd@mmg';
    ";   
    $result = mysqli_query($con, $sql);
    echo var_dump($result);
    $aff = mysqli_affected_rows($con);

    echo "Number of affected rows: $aff";
?>
