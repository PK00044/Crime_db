<?php
include 'connection.php';
if(isset($_POST['edit_id'])) {
    $comp_id = $_POST['edit_complaint_id'];
    
    // Fetch record from the database
    $sql = "SELECT * FROM `complaints_details` WHERE `complaint_id` = $comp_id";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $ack = $row['ack_no'];
        $comp_id = $row['complaint_id'];
        $last_name = $row['Wit_name'];

        $ph_no = $row['Wit_phno'];
        $age = $row['Crim_age'];
        $gender = $row['Wit_gender'];
        $gender = $row['crim_gen'];
        $crime = $row['Crime'];
        $city = $row['City'];
        $Address = $row['Address'];
        $pin = $row['Pin-code'];
        $state = $row['State'];
        $date = $row['Date'];
        $email = $row['Wit_email'];
        $desc = $row['desc'];
        $image = $row['image'];
        $image = $row['STATUS'];
    }
    else {
        echo "No record found with ID: $edit_id";
        exit; // Stop further execution
    }
}
else {
    echo "ID parameter is missing!";
    exit; // Stop further execution
}
?>
