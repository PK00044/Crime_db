<?php
    use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'mail/Exception.php';
    require 'mail/PHPMailer.php';
    require 'mail/SMTP.php';
$send = false;
$insert = false;

if (isset($_POST['submit'])) {

    require 'connection.php';

    // $servername = 'localhost';
    // $username = "root";
    // $password = "";
    // $database_name = "dbtrailmine";

    // //create a connection
    // $con = mysqli_connect($servername, $username, $password, $database_name);

    // die if connection was not successful
    // if(!$con){
    //     die("Sorry we failed to connect: " . mysqli_connect_error());
    // }
    // else{
    //     echo "<br> Connection was successful"; 
    // }
    
    
   
    $Wit_name = $_POST['Wit_name'];
    $Wit_phno = $_POST['Wit_phno'];
    $Crim_age = $_POST['Crim_age'];
    $Wit_gender = $_POST['Wit_gender'];
    $crim_gen = $_POST['crim_gen'];
    $crime = $_POST['crime'];
    $city = $_POST['city'];
    $Address = $_POST['Address'];
    $pin = $_POST['pin'];
    $state = $_POST['state'];
    $date = $_POST['date'];
    $Wit_email = $_POST['Wit_email'];
    $desc = $_POST['desc'];
    $image = "No File available";
    $ack = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'), 0, 10);

    // Check if the generated acknowledgment number already exists in the database
    // If it does, regenerate the acknowledgment number until it is unique
    $query = "SELECT ack_no FROM complaints_details WHERE ack_no = '$ack'";
    $result = mysqli_query($con, $query);

    while (mysqli_num_rows($result) > 0) {
        $ack = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'), 0, 10);
        $query = "SELECT ack_no FROM complaints_details WHERE ack_no = '$ack'";
        $result = mysqli_query($con, $query);
    }
    // if(isset($_POST['image'])){
        
    // }
    // else{
  


    // SQL Injection Prevention: Sanitize user inputs
    // $fname = mysqli_real_escape_string($con, $fname);
    // $lname = mysqli_real_escape_string($con, $lname);
    // $email = mysqli_real_escape_string($con, $email);
    // $Message = mysqli_real_escape_string($con, $Message);

    $sql = "INSERT INTO `complaints_details` (`ack_no`,`Wit_name`,`Wit_phno`,`Crim_age`,`Wit_gender`,`crim_gen`,`Crime`,`City`,`Address`,`Pin-code`,`State`,`Date`,`Wit_email`,`desc`,`image`) VALUES ('$ack','$Wit_name','$Wit_phno','$Crim_age','$Wit_gender','$crim_gen','$crime','$city','$Address','$pin','$state','$date','$Wit_email','$desc','$image')";
    $result =  mysqli_query($con, $sql);

    if ($result) {
        $insert = true;
        
        echo "The data was submitted successfully";
        $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'cseeng148@gmail.com';                     // SMTP username
        $mail->Password   = 'rsau chdx gpvs eyda';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('cseeng148@gmail.com', 'Admin');
        $mail->addAddress($Wit_email);     // Add a recipient

        $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'),0,10);
    
        // Content
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Confirm Complaint Submit';
        $mail->Body    = 'The complaint has been submitted and your Acknowledgment number is ' . $code . '<br> You can track your complaint using this Acknowledgment number.';
        
        $conn = new mySqli('localhost', 'root', '', 'dbtrailmine');

        if($conn->connect_error) {
            die('Could not connect to the database.');
        }

        $verifyQuery = $conn->query("SELECT * FROM complaints_details WHERE Wit_email = '$Wit_email'");

        if($verifyQuery->num_rows) {
            $codeQuery = $conn->query("UPDATE complaints_details SET ack_no = '$code' WHERE Wit_email = '$Wit_email'");
                
            $mail->send();
            // echo 'Message has been sent, check your email';
            $send = true;
        }
        $conn->close();
    
        // $conn = new mySqli('localhost', 'root', '', 'dbtrailmine');

        // if($conn->connect_error) {
        //     die('Could not connect to the database.');
        // }

        // $verifyQuery = $conn->query("SELECT * FROM user_account WHERE email = '$email'");

        // if($verifyQuery->num_rows) {
        //     $codeQuery = $conn->query("UPDATE user_account SET code = '$code' WHERE email = '$email'");
                
        //     $mail->send();
        //     echo 'Message has been sent, check your email';
        // }
        // $conn->close();
    
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }    
    // Close the connection
    mysqli_close($con);
}

else{
    echo "The data wasn't submitted successfully -->" . mysqli_error($con);
    echo '<div class="dang" role="alert"><strong>ERROR! We are facing some technical issues and  Your Entry was not been submitted. We regret the inconvinience caused</strong>
    <button class="close" type="button" onclick="closeAlert()" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
        </div>';
}
    

    // Decrementing auto-increment values
    // $sql_decrement = "SET @num := 0";
    // $result_decrement = mysqli_query($con, $sql_decrement);
    // if (!$result_decrement) {
    //     echo "Error setting variable: " . mysqli_error($con);
    // }

    // $sql_update = "UPDATE `contactus_details` SET `SNO` = @num := (@num+1)";
    // $result_update = mysqli_query($con, $sql_update);
    // if (!$result_update) {
    //     echo "Error updating auto-increment values: " . mysqli_error($con);
    // }

    // $sql_alter = "ALTER TABLE `contactus_details` AUTO_INCREMENT = 1";
    // $result_alter = mysqli_query($con, $sql_alter);
    // if (!$result_alter) {
    //     echo "Error resetting auto-increment: " . mysqli_error($con);
    // }

    // Instantiation and passing `true` enables exceptions
    
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Registration</title>
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
            padding: 30px;
            box-sizing: border-box;
            font-weight: bold;
        }
    .signup{
        background-color: black;
        /* width: 100%; */
        /* position: relative; */
        padding: 25px;
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
        width: 60vw;
        height: auto;
        text-align: center;
        padding: 10px;
        box-sizing: border-box;

        border-radius: 50px;
    }
    label{
        font-size: 16px;
        font-weight: bold;
        
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
    
    
    input[type=radio] {
        width: 5%;
        height: 16px;
}
    /* p{
        font-size: 40px;

    } */
    input[type=email],textarea,input[type=datetime-local],input[type=file],input[type=text],input[type=number],input[type=tel]{
        box-shadow: 0px 0px 0px 2px black;
        width: 80%;
        border: 2px solid red;
        border-radius: 4px;
        padding: 22px 10px;
        margin: 20px 10%;
        box-sizing: border-box;
        display:flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        font-size: 16px;
    }
    input[type=email]:hover,input[type=datetime-local]:hover,textarea:hover,input[type=file]:hover,input[type=text]:hover,input[type=tel]:hover,input[type=number]:hover{
        box-shadow: 0px 0px 10px 2px black;
        box-sizing: border-box;
    }
    input[type=email]::placeholder,textarea::placeholder,input[type=number]::placeholder,input[type=text]::placeholder,input[type=tel]::placeholder{
        font-size: 15px;
        color: rgb(0, 0, 0);
        box-sizing: border-box;
    }
    .button{
        text-align: center;
        box-sizing: border-box;
    }
    input[type="reset"], input[type="submit"]{
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
    input[type="reset"]:hover,input[type="submit"]:hover{
        background-color: rgb(0, 0, 1);
        color: rgb(162, 162, 244);
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
        font-size: 50px;
}
.info {
  background-color: #e7f3fe;
  border-left: 6px solid #2196F3;
  margin: 25px;
  text-align: center;
}

    </style>
</head>

<body>
    <header class="fixed-top">
        <h1 class="CID">Crime Management System</h1>
        <nav>
            <div class="logo">
            <a href="index.html">
                    <img class="rotate" src="ashok.jpg" alt="LOGO">
                </a>
            </div>
            <div class="items">
                <ul class="cta-buttons">
                    <?php
                        if(isset($_SESSION['id'])){
                           echo ' <a href="index3.php" class="btn">Home</a>';
                        }
                        else{
                            echo ' <a href="index2.php" class="btn">Home</a>';

                        }

                    ?>
                    <a href="complaint.php" class="btn" style="background-color: aliceblue; color: black;">Complaint</a>
                    <a href="TrackRecord.php" class="btn">Track your Complaint</a>
                    <a href="contact_us.php" class="btn">Contact us</a>
                    <a href="logout.php" class="btn">Logout</a>

                </ul>
            </div>
        </nav>
    </header>
    <?php
    if ($send == true) {
                echo '<div class="info" role="alert" id="successAlert">
            <strong>Success!</strong> Your Entry has been submitted
            <button class="close" type="button" onclick="closeAlert()" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
            }

            ?>
    <h2 id="founder">Complaint Registration</h2>
    <main class="signup">
        <div class="container">
            <form action="complaint.php" name="name" method="post">
                    <p>
                        <label>Witness Name:</label>
                        <input type="text" name="Wit_name" placeholder="your first name" required>
                    </p>
                    <p>
                       <label>Witness Phone Number:</label>
                       <input type="tel" name="Wit_phno" placeholder="Enter Phone Number" required>
                    </p>
                    <p>
                       <label>Approx Age of criminal:</label>
                       <input type="number" name="Crim_age" placeholder="Enter Age" required>
                    </p>

                    <p>
                       <label>Witness Gender:</label><br>
                       <input type="radio" name="Wit_gender" value="Male" required>Male
                       <input type="radio" name="Wit_gender" value="Female" required>Female
                    </p>
                    <br>
                    <p>
                       <label>Criminal Gender(If known):</label><br>
                       <input type="radio" name="crim_gen" value="Male">Male
                       <input type="radio" name="crim_gen" value="Female" >Female
                    </p>
                    <br>
                    <p>
                       <label>Crime:</label>
                       <input type="text" name="crime" placeholder="Enter Crime"  required>
                    </p>

                    <p>
                       <label>City:</label>
                       <input type="text" name="city" placeholder="Enter City" required>
                    </p>
                    <p>
                        <label>Address: <br></label>
                        <textarea name="Address" cols="50" rows="10" placeholder="Enter Address" required></textarea>
                    </p>
                    
                    <p>
                        <label>Pin-code:</label>
                        <input type="number" name="pin" placeholder="Enter pincode" required>
                     </p>

                    <p>
                        <label>State:</label>
                        <input type="text" name="state" placeholder="Enter State" required>
                     </p>
                     
                    <p>
                        <label>Date:</label>
                        <input type="datetime-local" name="date" placeholder="Enter Date and Time" required>
                     </p>
                     
                    <p>
                       <label>Description: <br></label>
                       <textarea name="desc" cols="50" rows="10" placeholder="Enter Description" required></textarea>
                    </p>

                    <p>
                        <label>Witness Email:</label>
                        <input type="email" name="Wit_email" placeholder="Enter email" required>
                    </p>

                    <p>
                       <label>Upload a image of criminal(if available):</label>
                       <input type="file" name="image">
                    </p>

                <input type="submit" name="submit"> <input type="reset">
            </form>
        </div>

    </main>

    <div class="info">
        <p><strong>Info!</strong> FALSE STATEMENTS MADE HEREIN, ARE PUNISHABLE.</p>
      </div>
      






    <footer>
        <p>&copy; 2024 Crime Management System</p> 
    </footer>
</body>

</html>