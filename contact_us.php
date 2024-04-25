<?php

$insert = false;

if (isset($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['Message'])) {
    $servername = 'localhost';
    $username = "root";
    $password = "";
    $database_name = "dbtrailmine";

    //create a connection
    $con = mysqli_connect($servername, $username, $password, $database_name);

    // die if connection was not successful
    // if(!$con){
    //     die("Sorry we failed to connect: " . mysqli_connect_error());
    // }
    // else{
    //     echo "<br> Connection was successful"; 
    // }



    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $Message = $_POST['Message'];

    // SQL Injection Prevention: Sanitize user inputs
    // $fname = mysqli_real_escape_string($con, $fname);
    // $lname = mysqli_real_escape_string($con, $lname);
    // $email = mysqli_real_escape_string($con, $email);
    // $Message = mysqli_real_escape_string($con, $Message);

    $sql = "INSERT INTO `contactus_details` (`FNAME`, `LNAME`, `EMAIL`, `MESSAGE`) VALUES ('$fname', '$lname', '$email', '$Message')";

    $result =  mysqli_query($con, $sql);

    if ($result) {
        $insert = true;

        // echo "The data was submitted successfully";
    } else {
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

    // Close the connection
    mysqli_close($con);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Form</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            box-sizing: border-box;
        }

        main {
            background-color: white;
            text-align: center;
        }

        h2 {
            padding: 20px;
        }


        footer {
            background-color: #333;
            color: wheat;
            overflow: hidden;
            padding: 25px;
            text-align: center;
        }

        #founder {
            background-color: lightblue;
        }

        #cont>form {
            margin: auto;
            width: 50%;
            padding: 12px 20px;
            /* margin: 8px 0; */
            box-sizing: border-box;
            font-size: 25px;
        }
        input[type=email]:hover{
            box-shadow: 0px 0px 10px 2px black;
        box-sizing: border-box;
        }
        input[type=email]{
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
        input[type=email]::placeholder{
            font-size: 15px;
        color: rgb(0, 0, 0);
        box-sizing: border-box;
        }
        /* input[type=text],
        input[type=email],
        textarea {
            border: 2px solid red;
            border-radius: 4px;
            padding: 12px 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        input[type=submit],
        input[type=reset] {
            background-color: #04AA6D;
            border: none;
            color: white;
            padding: 16px 32px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
            font-size: 15px;
        } */

        .info {
            background-color: #e7f3fe;
            border-left: 6px solid #2196F3;
            margin: 25px;
            text-align: center;
            font-size: 45px;
        }

        .dang {
            background-color: red;
            border-left: 6px solid red;
            margin: 25px;
            text-align: center;
        }

        .close {
            width: 45px;
            height: 45px;
            font-size: 24px;
        }

        @media screen and (max-width: 768px) {

            #cont>form,
            * {
                width: 90%;
                font-size: 20px;
            }
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

                    <a href="contact_us.html" style="background-color: aliceblue; color: black;" class="btn">Contact us</a>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div id="cont">
            <h2 id="founder">Contact Form</h2>
            <?php
            if ($insert == true) {
                echo '<div class="info" role="alert" id="successAlert">
            <strong>Success!</strong> Your Entry has been submitted
            <button class="close" type="button" onclick="closeAlert()" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
            }

            ?>
            <form action="contact_us.php" name="contact_us" method="post">
                <fieldset>
                    <legend>Send us a Message</legend>
                    <p>
                        <label for="Fname">First Name:</label>
                        <input type="text" name="fname" id="Fname" placeholder="your first name" required>
                    </p>
                    <p>
                        <label for="Lname">Last Name:</label>
                        <input type="text" name="lname" id="Lname" placeholder="your last name" required>
                    </p>
                    <p>
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" placeholder="your email" required>
                    </p>
                    <p>
                        <label for="Message">Your Message:</label><br>
                        <textarea name="Message" id="Message" cols="30" rows="10" placeholder="Enter your Message"></textarea>
                    </p>
                </fieldset>
                <input type="submit"> <input type="reset">
            </form>
        </div>

    </main>






    <center>
    
    <div id="founder">
    <h3>Email: <a href="mailto:cseeng148@gmail.com">crime@gmail.com</a></h3>     
   </div>
    </center>
        <hr>


    <footer>
        <?php
        $year = date("Y");

        echo "<p>&copy; $year Crime Management System</p>";
        ?>
    </footer>




    <script>
        function closeAlert() {
            var alert = document.getElementById('successAlert');
            alert.style.display = 'none';
        }
    </script>





</body>

</html>