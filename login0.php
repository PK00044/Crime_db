<?php
$login = false;
$showError = false;
if(isset($_POST['Login'])){
    include 'connection.php';
    $name = $_POST["name"];
    $id = $_POST["id"];
    $email = $_POST["email"];
    if(isset($_POST["password"])) {
        $password = $_POST["password"];
    } else {
        $showError = "Password field not received.";
        echo $showError;
        exit();
    }

    // Generate OTP
    $otp = rand(100000, 999999);

    // Send OTP to the user's email
    $to = $email;
    $subject = "OTP for Login";
    $message = "Your OTP for login is: $otp";
    $headers = "From: cseeng148@gmail.com";

    if(mail($to, $subject, $message, $headers)) {
        session_start();
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;
        header('location: verify_otp.php');
        exit();
    } else {
        $showError = "Failed to send OTP. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
    box-sizing: border-box;
}
.msg{
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
    .login{
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
    .container{
        box-shadow: 0px 0px 50px 0px rgba(45,255,196,0.98);
        background-color: white;
        width: 500px;
        height: auto;

        
        box-sizing: border-box;
        /* margin: 20px 749px;             */
        border-radius: 50px;
    }
    .container h1{
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
    input[type=text],input[type=email],input[type=password]{
        box-shadow: 0px 0px 0px 2px black;
        width: 80%;
        border: 2px solid red;
        border-radius: 4px;
        padding: 22px 10px;
        margin: 20px 50px;
        box-sizing: border-box;
        display:flex;
        justify-content: center;
        align-items: center;
        
    }
    input[type=text]:hover,input[type=email]:hover,input[type=password]:hover{
        box-shadow: 0px 0px 10px 2px black;
        box-sizing: border-box;
    }
    input[type=text]::placeholder,input[type=password]::placeholder,input[type=email]::placeholder{
        font-size: 15px;
        color: rgb(0, 0, 0);
        box-sizing: border-box;
    }
    .button{
        text-align: center;
        box-sizing: border-box;
    }
    input[type="submit"]{
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
    input[type="submit"]:hover{
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
    h2{
        display: flex;
        justify-content: center;
        padding-top: 15px;
        box-sizing: border-box;
    }
    h2 a{
        text-align: center;
        text-decoration: none;
        color: #007bff;
        font-size: 25px;
        padding: 0 8px;
        box-sizing: border-box;
    }
    h2 a:hover{
        text-decoration: underline;
        box-sizing: border-box;
    }
    #founder {
    background-color: lightblue;    
    padding: 25px;
    box-sizing: border-box;

}
    </style>
</head>
<body>
    <!-- Header section -->

    <!-- Error/success message display -->
    <?php
    if($showError){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error!</strong> '. $showError .'
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>';
    }
    ?>

    <!-- Login form -->
    <div class="msg">
        <h1 id="founder">Login to get hold of the data you want</h1>
    </div>
    <main class="login">
        <div class="container">
            <h1>Login Form</h1>
            <p style="display: flex; justify-content: center;padding-top: 5px; font-size: 20px;"><b>Login with your email and password</b></p>
            
            <form action="" name="Login" method="post">

                <input type="text" name="name" placeholder="Enter name:" required>
                <input type="text" name="id" placeholder="Enter id:" required>

                <input type="email" name="email" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Password" required>

                <div class="button">
                    <input type="submit" name="Login" value="Login"></button>
                </div>
                <h2>New User<a href="officialsignup.php">Sign Up</a></h2>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <!-- Footer content -->
    </footer>
</body>
</html>
