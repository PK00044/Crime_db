<?php
// Include your database connection code here
include 'connection.php';

if(isset($_POST['delete'])) {
    // Get the record ID from the POST parameters
$comp_id = $_POST['delete_complaint_id'];
    // SQL query to delete the record with the provided ID
    $sql = "DELETE FROM `complaints_details` WHERE `complaint_id` = '$comp_id'";

    // Execute the query
    if(mysqli_query($con, $sql)) {
        // If deletion is successful, send a success response
        echo "Record deleted successfully.";
        
        header('refresh:3; url=Criminal Records.php');
        exit();
    } else {
        // If deletion fails, send an error response
        echo "Error deleting record: " . mysqli_error($con);
        exit();
    }
} else {
    // If record ID is not provided, send an error response
    echo "Record ID not provided.";
    exit();
}
?>
