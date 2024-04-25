<?php
$login = false;
$showError = false;
if(isset($_POST['Login'])){
    include 'connection.php';
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    if(isset($_POST["password"])) {
        $password = $_POST["password"];
    } else {
         // Handle the case when 'password' key is not set
        // For example, display an error message or log the issue
        $showError = "Password field not received.";
        echo $showError;
        exit();
        // Optionally, you can return or exit the script here to prevent further execution
        // return; // or exit();
    }


    // print_r($_POST);
    // echo '<br>';
    // var_dump($_POST);
    // Fetch user by email
    $sql = "SELECT * FROM signup_details WHERE email='$email'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1){
        $row = mysqli_fetch_assoc($result);
//         echo "Hashed Password: " . $row['PASSWORD'] . "<br>";
// echo "Entered Password: " . password_hash($password, PASSWORD_DEFAULT) . "<br>";
        // Verify password
        if (isset($row['PASSWORD']) && password_verify($password, $row['PASSWORD'])){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            // Set username session variable
            $_SESSION['username'] = $fname . " " . $lname;
            // Redirect to index2.php
            header('location: index2.php');
            exit();
        } else {
            $showError = "Invalid Password";
        }
    } else {
        $showError = "Email not found Please do Sign UP";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
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
                <a href="contact_us.php" class="btn">Contact us</a>
                <a href="login.php" class="btn" style="background-color: aliceblue; color: black;">User Login</a>
                <a href="signup.php" class="btn">User Sign Up</a>          
            </ul>
        </div></nav>
    </header>
    <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>
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


    <div class="msg">
        <h1 id="founder">User Login </h1>
    </div>
    <main class="login">
        <div class="container">
            <h1>User Login Form</h1>
            <p style="display: flex; justify-content: center;padding-top: 5px; font-size: 20px;"><b>Login with your email and password</b></p>
            
            <form action="" name="Login" method="post">

                <input type="text" name="fname" placeholder="Enter first name:" required>
                <input type="text" name="lname" placeholder="Enter last name:" required>

                <input type="email" name="email" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Password" required>

                <a class="forpass" href="user-forgot-password.php">Forgot password?</a>
                <div class="button">
                    <input type="submit" href="index2.html" name="Login" value="Login"></button>
                </div>
                <h2>New User<a href="sign_up.html">Sign Up</a></h2>
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