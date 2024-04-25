<?php
include 'connection.php';
// Include your database connection code here
// Example:
// $servername = 'localhost';
// $username = "root";
// $password = "";
// $database_name = "dbtrailmine";
// $con = mysqli_connect($servername, $username, $password, $database_name);
// if (!$con) {
//     die("Sorry we failed to connect: " . mysqli_connect_error());
// }

if (isset($_POST['edit_id'])) {
    // Collect form data
            // $comp_id = $_POST['$edit_complaint_id'];
            $ack = $_POST['edit_ack_no'];
            $Wit_name = $_POST['edit_witness_name'];

            $ph_no = $_POST['edit_witness_phone'];
            $age = $_POST['edit_criminal_age'];
            $Wit_gender = $_POST['edit_witness_gender'];
            $crim_gen = $_POST['edit_criminal_gender'];
            $crime = $_POST['edit_crime'];
            $city = $_POST['edit_city'];
            $Address = $_POST['edit_address'];
            $pin = $_POST['edit_pincode'];
            $state = $_POST['edit_state'];
            $date = $_POST['edit_date'];
            $Wit_email = $_POST['edit_witness_email'];
            $desc = $_POST['edit_description'];
            $image = $_POST['edit_image'];
            $status = $_POST['edit_status'];
            }
        
        // $comp_id = $row['complaint_id'];
        
    // Update record in the database
    $sql = "UPDATE `complaints_details` SET  `Wit_name` = '$Wit_name', `Wit_phno` = '$ph_no', `Crim_age` = '$age', `Wit_gender` = '$Wit_gender', `crim_gen` = '$crim_gen', `Crime` = '$crime', `City` = '$city', `Address` = '$Address', `Pin-code` = '$pin', `State` = '$state', `Date` = '$date', `desc` = '$date', `Wit_email` = '$Wit_email', `image` = '$image', `STATUS` = '$status' WHERE `ack_no` = '$ack';";

    if (mysqli_query($con, $sql)) {
        echo "Record updated successfully";
        header('refresh:3; url=Criminal Records.php');
        die();
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }

    // Close the database connection
    // Example:
    // mysqli_close($con);
?>
