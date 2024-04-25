
    <?php
$insert = false;
$delete = false;
$update = false;

// Database connection
$servername = 'localhost';
$username = 'root';
$password = '';
$database_name = 'dbtrailmine';

// Create a connection
$con = mysqli_connect($servername, $username, $password, $database_name);

// Check if connection was successful
if (!$con) {
    die('Sorry we failed to connect: ' . mysqli_connect_error());
}

// Read (Retrieve) Operation
function getContacts($con)
{
    $sql = 'SELECT * FROM contactus_details';
    $result = mysqli_query($con, $sql);
    $contacts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $contacts;
}

// Create Operation
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $message = $_POST['Message'];

    $sql = "INSERT INTO contactus_details (FNAME, LNAME, EMAIL, MESSAGE) VALUES ('$fname', '$lname', '$email', '$message')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $insert = true;
    } else {
        echo 'The data wasn\'t submitted successfully -->' . mysqli_error($con);
    }
}

// Update Operation
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "UPDATE contactus_details SET FNAME='$fname', LNAME='$lname', EMAIL='$email', MESSAGE='$message' WHERE SNO=$id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $update = true;
    } else {
        echo 'The data wasn\'t updated successfully -->' . mysqli_error($con);
    }
}

// Delete Operation
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM contactus_details WHERE SNO=$id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $delete = true;
    } else {
        echo 'The data wasn\'t deleted successfully -->' . mysqli_error($con);
    }
}

// Close the connection
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        main {
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        .contact {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            padding: 10px;
        }

        .contact form {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .contact form input[type="text"],
        .contact form textarea {
            width: 30%;
            padding: 8px;
            margin-right: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .contact form button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .contact form button:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Contact Us Form</h1>
    </header>
    <main>
        <h2>Contact Entries</h2>
        <?php
        $contacts = getContacts($con);
        foreach ($contacts as $contact) {
            echo '<div class="contact">';
            echo '<form method="post">';
            echo '<input type="hidden" name="id" value="' . $contact['SNO'] . '">';
            echo '<input type="text" name="fname" value="' . $contact['FNAME'] . '" required>';
            echo '<input type="text" name="lname" value="' . $contact['LNAME'] . '" required>';
            echo '<input type="text" name="email" value="' . $contact['EMAIL'] . '" required>';
            echo '<textarea name="Message" required>' . $contact['MESSAGE'] . '</textarea>';
            echo '<button type="submit" name="update">Update</button>';
            echo '<button type="submit" name="delete">Delete</button>';
            echo '</form>';
            echo '</div>';
        }
        ?>
    </main>
    <footer>
        &copy; <?php echo date("Y"); ?> Crime Management System
    </footer>
</body>
</html>


