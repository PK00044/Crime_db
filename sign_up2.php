<?php
    include 'connection.php';

    $errors = array();
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $Fname = $_POST['first_name'];
        $Lname = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];

        // Checking for password match 
        if($password != $c_password)
        {
            $errors['password'] = "Confirm password not matched!";
        }

        // Checking for email check!
        $email_check = "SELECT * FROM signup_details WHERE EMAIL = '$email'";
        $res = mysqli_query($con, $email_check);
        if(mysqli_num_rows($res) > 0){
            $errors['email'] = "Email that you have entered is already exist!";
        }
        if(count($errors) === 0){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `signup_details` (`FNAME`,`LNAME`, `EMAIL`, `PASSWORD`) VALUES ('$Fname','$Lname','$email', '$hash')";
            $result = mysqli_query($con, $sql);
            if($result){
                header('Location: login.php');
                die();
            }
        }
    }

?>