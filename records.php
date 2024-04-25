<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criminal Records</title>
    <link rel="stylesheet" href="style.css">
    <style>
    
        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            /* border-collapse: collapse; */
            margin-bottom: 20px;
        }

        th, td {
            text-align: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            font-size: 15px;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .edit_btn,.delete_btn {
            background-color: #4CAF50;
            text-decoration: none;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .edit_btn:hover,.delete_btn:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        #founder {
    background-color: lightblue;    
    padding: 25px;
    box-sizing: border-box;
    text-align: center;
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
                <a href="index3.html" class="btn">Home</a>
                <a href="complaint.php" class="btn">Register a complaint</a>
                <a href="Criminal Records.php" class="btn" style="background-color: aliceblue; color: black;">Complaint Records</a>
                <a href="contact_us.php" class="btn">Contact us</a>
                <a href="about_us.html" class="btn">About Us</a>
                <a href="index.html" class="btn">Log Out</a>

                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div id="cont">
            <h2 id="founder">Criminal Records take the data from criminal records table from db coz this data is from contact us table</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                    <th>Ack no</th>
                        <th>Complaint ID</th>
                        <th>Criminal Name</th>
                        <th>Witness Name</th>
                        <th>Witness Phone no</th>
                        <th>Age of Criminal(Approx)</th>
                        <th>Crime</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Pincode</th>
                        <th>State</th>
                        <th>Date</th>
                        <th>Wit Email</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = 'localhost';
                    $username = "root";
                    $password = "";
                    $database_name = "dbtrailmine";

                    // Create a connection
                    $con = mysqli_connect($servername, $username, $password, $database_name);

                    // Die if connection was not successful
                    if (!$con) {
                        die("Sorry we failed to connect: " . mysqli_connect_error());
                    }

                    // Fetching data from the table
                    $sql = "SELECT * FROM `complaints_details`";
                    $result =  mysqli_query($con, $sql);

                    // Display the rows returned by the SQL query
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $row['ack_no'] . '</td>';
                            echo '<td>' . $row['complaint_id'] . '</td>';
                            echo '<td>' . $row['Wit_name'] . '</td>';
                            echo '<td>' . $row['Wit_phno'] . '</td>';
                            echo '<td>' . $row['Crim_age'] . '</td>';
                            echo '<td>' . $row['Wit_gender'] . '</td>';
                            echo '<td>' . $row['crim_gen'] . '</td>';
                            echo '<td>' . $row['Crime'] . '</td>';
                            echo '<td>' . $row['City'] . '</td>';
                            echo '<td>' . $row['Address'] . '</td>';
                            echo '<td>' . $row['Pin-code'] . '</td>';
                            echo '<td>' . $row['State'] . '</td>';
                            echo '<td>' . $row['Date'] . '</td>';
                            echo '<td>' . $row['Wit_email'] . '</td>';
                            echo '<td>' . $row['desc'] . '</td>';
                            echo '<td>' . $row['image'] . '</td>';
                            echo '<td>' . $row['STATUS'] . '</td>';
                            echo '<td>
                            <a href="complaint.php" class="edit_btn" role="button">Edit</a> <br> <br> <br>
                            <button class="delete_btn">Delete</button></td>';
                            echo '</tr>';
                            
                        }
                    } else {
                        echo '<tr><td colspan="5">No records found</td></tr>';
                    }

                    // Close the connection
                    mysqli_close($con);
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <footer>
        &copy; <?php echo date("Y"); ?> Crime Management System
    </footer>
</body>
</html>
