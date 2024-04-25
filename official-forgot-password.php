<?php
// // Include database connection file
// include 'connection.php';

// // Initialize variables
// $email = "";
// $verificationCode = "";

// // Function to generate a random verification code
// function generateVerificationCode($length = 6) {
//     return strtoupper(substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length));
// }

// // Process form submission
// if(isset($_POST['submit'])) {
//     // Get email from form
//     $email = mysqli_real_escape_string($con, $_POST['email']);

//     // Validate email
//     if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         $error = "Invalid email format";
//     } else {
//         // Generate verification code
//         $verificationCode = generateVerificationCode();

//         // Store verification code in database
//         $sql = "INSERT INTO password_reset (email, verification_code) VALUES ('$email', '$verificationCode')";
//         if(mysqli_query($con, $sql)) {
//             // Send email with verification code
//             $to = $email;
//             $subject = "Password Reset Verification Code";
//             $message = "Your verification code is: $verificationCode";
//             $headers = "From: zzzz@example.com";

//             if(mail($to, $subject, $message, $headers)) {
//                 $success = "Verification code sent to your email. Please check your inbox.";
//             } else {
//                 $error = "Failed to send verification code. Please try again later.";
//             }
//         } else {
//             $error = "Failed to store verification code in database. Please try again later.";
//         }
//     }
// }
require 'connection.php';



$errors = array();
$alert = "Password Changed";

if (isset($_POST['Submit'])) {
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    if ($password != $cpassword) {
        $errors['password'] = "Confirm password not matched!";
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> ' . $errors['password'] . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    $id_check = "SELECT * FROM official_details WHERE ID = '$id'";
    $id_result = mysqli_query($con, $id_check);
    if (mysqli_num_rows($id_result) < 1) {
        $errors['id'] = "ID does not exist!";
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> ' . $errors['id'] . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }

    // Check if email matches the ID
    $email_check = "SELECT * FROM official_details WHERE ID = '$id' AND email = '$email'";
    $email_result = mysqli_query($con, $email_check);
    if (mysqli_num_rows($email_result) < 1) {
        $errors['email'] = "Email does not match the provided ID!";
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> ' . $errors['email'] . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if (count($errors) === 0) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE `official_details` SET `password` = '$hash' WHERE `official_details`.`ID` = $id;";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo '<div class="alert alert-success-custom alert-dismissible fade show" role="alert">
                      <strong>Password changed successfully.</strong> Please login with your new password.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>';
            header('refresh:3; url=officiallogin.php');
            die();
        }
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo '<div class="alert alert-danger-custom alert-dismissible fade show" role="alert">
                  ' . $error . '
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Official Forget Password</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            box-sizing: border-box;
        }

        .msg {
            text-align: center;
        }

        footer {
            background-color: #333;
            color: wheat;
            overflow: hidden;
            display: flex;
            justify-content: center;
            padding: 50px;
            box-sizing: border-box;
        }

        .login {
            background-color: black;
            /* width: 100%; */
            /* position: relative; */
            padding: 25px;
            padding-bottom: 100px;
            /* height: 61vh; */
            /* overflow:hidden; */
            text-align: center;
            display: flex;
            justify-content: center;
            box-sizing: border-box;
        }

        .container {
            box-shadow: 0px 0px 50px 0px rgba(45, 255, 196, 0.98);
            background-color: white;
            width: 500px;
            height: auto;


            box-sizing: border-box;
            /* margin: 20px 749px;             */
            border-radius: 50px;
        }

        .container h1 {
            display: flex;
            justify-content: center;
            padding-top: 10px;
            box-sizing: border-box;
        }

        /* .msg{
        font-size: 30px;  
        display: flex;
        justify-content: center;
    } */
        input[type=text],
        input[type=email],
        input[type=password] {
            box-shadow: 0px 0px 0px 2px black;
            width: 80%;
            border: 2px solid red;
            border-radius: 4px;
            padding: 22px 10px;
            margin: 20px 50px;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        input[type=text]:hover,
        input[type=email]:hover,
        input[type=password]:hover {
            box-shadow: 0px 0px 10px 2px black;
            box-sizing: border-box;
        }

        input[type=text]::placeholder,
        input[type=password]::placeholder,
        input[type=email]::placeholder {
            font-size: 15px;
            color: rgb(0, 0, 0);
            box-sizing: border-box;
        }

        .button {
            text-align: center;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 15px 15px;
            border-radius: 15px;
            font-size: 20px;
            background-color: rgb(187, 187, 244);
            color: blue;
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
            border: none;
            cursor: pointer;
            box-sizing: border-box;
        }

        input[type="submit"]:hover {
            background-color: rgb(0, 0, 1);
            color: rgb(162, 162, 244);
            box-sizing: border-box;
        }

        .forpass {
            text-align: center;
            margin: 30px 0px 10px 0px;
            display: block;
            text-decoration: none;
            color: #007bff;
            font-size: 25px;
            box-sizing: border-box;
        }

        h2 {
            display: flex;
            justify-content: center;
            padding-top: 15px;
            box-sizing: border-box;
        }

        h2 a {
            text-align: center;
            text-decoration: none;
            color: #007bff;
            font-size: 25px;
            padding: 0 8px;
            box-sizing: border-box;
        }

        h2 a:hover {
            text-decoration: underline;
            box-sizing: border-box;
        }

        #founder {
            background-color: lightblue;
            padding: 25px;
            box-sizing: border-box;

        }

        .alert {
            position: relative;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }

        .alert-success-custom {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-danger-custom {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .alert-success-custom strong {
            font-weight: bold;
        }

        .alert-dismissible .close {
            position: absolute;
            top: 0;
            right: 0;
            padding: 0.75rem 1.25rem;
            color: inherit;
        }
    </style>
</head>

<body>
    <header>
        <h1 class="CID">Crime Management System</h1>
        <nav>
            <div class="logo">
                <a href="index.html">
                    <img class="rotate" src="ashok.jpg" alt="LOGO">
                </a>
            </div>
            <div class="items">
                <ul class="cta-buttons">
                    <a href="index.html" class="btn">Home</a>
                    <!-- <a href="contact_us.html" class="btn">Contact us</a>
                <a href="login.html" class="btn" style="background-color: aliceblue; color: black;">Login</a>
                <a href="sign_up.html" class="btn">Sign Up</a>           -->
                </ul>
            </div>
        </nav>
    </header>
    <?php
    // if($login){
    // echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    //     <strong>Success!</strong> You are logged in
    //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //         <span aria-hidden="true">&times;</span>
    //     </button>
    // </div> ';
    // }
    ?>
    <?php
    // if($showError){
    //     echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    //               <strong>Error!</strong> '. $showError .'
    //               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                   <span aria-hidden="true">&times;</span>
    //               </button>
    //           </div>';
    // }
    ?>


    <div class="msg">
        <h1 id="founder">Reset Password</h1>
    </div>
    <main class="login">
        <div class="container">
            <!-- <h1>Reset Password</h1> -->
            <!-- <p style="display: flex; justify-content: center;padding-top: 5px; font-size: 20px;"><b>Login with your email and password</b></p> -->
            <form action="" name="Submit" method="post">

                <input type="text" name="id" placeholder="Enter id:" required>

                <input type="email" name="email" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Enter a new Password" required>
                <input type="password" name="cpassword" placeholder="Confirm Password" required>


                <div class="button">
                    <input type="submit" href="officiallogin.php" name="Submit" value="Submit"></button>
                </div>
                <h2>New User<a href="officialsignup.php">Sign Up</a></h2>;
                }

            </form>
        </div>
    </main>

    <footer>
        <?php
        $year = date("Y");
        echo "<p>&copy; $year Crime Management System</p>";
        ?>
    </footer>
</body>

</html>