<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Record</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Your existing CSS styles */

        .signup {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .container {
            box-shadow: 0px 0px 50px 0px rgba(45, 255, 196, 0.98);
            background-color: white;
            width: 60vw;
            padding: 10px;
            border-radius: 20px;
            margin-bottom: 20px;
        }

        .table-container table {
            border-collapse: collapse;
            width: 100%;
        }

        .table-container th,
        .table-container td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .table-container th {
            background-color: #f2f2f2;
            color: #333;
        }

        .table-container table {
            border-collapse: collapse;
            width: 100%;
            background-color: white;
            /* Add this line */
        }
        .no{
            color: white;
        }
        /* Rest of your CSS styles */
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
                    if (isset($_SESSION['id'])) {
                        echo '<a href="index3.html" class="btn">Home</a>';
                    } else {
                        echo '<a href="index2.html" class="btn">Home</a>';
                    }
                    ?>
                <a href="complaint.php" class="btn">Register a complaint</a>
                <a href="complaint.php" class="btn"style="background-color: aliceblue; color: black;">Track your complaint</a>
                <a href="contact_us.php" class="btn">Contact us</a>
                <a href="aboutus.php" class="btn">About us</a>
                <a href="logout.php" class="btn">Logout</a>
                </ul>
            </div>
        </nav>
    </header>
    <main class="signup">
        <div class="container">
            <form action="TrackRecord.php" name="name" method="post">
                <p>
                    <label>Enter Acknowledgment Number:</label>
                    <input type="text" name="ack_no" placeholder="Your Acknowledgment Number:" required>
                </p>
                <input type="submit" name="submit"> <input type="reset">
            </form>
        </div>
        <div class="table-container">
            <?php
            // Establish database connection here
            include 'connection.php';
            // Assuming you have established a database connection and your table name is 'complaints'

            if (isset($_POST['submit'])) {
                $ack_no = $_POST['ack_no'];

                // Perform SQL query to fetch data based on acknowledgment number
                $sql = "SELECT * FROM complaints_details WHERE ack_no = '$ack_no'";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // Display table header
                    echo "<table border='1'>
                        <tr>
                        <th>Ack no</th>
                        <th>Complaint ID</th>
                        <th>Witness Name</th>
                        <th>Witness Phone no</th>
                        <th>Age of Criminal(Approx)</th>
                        <th>Witness Gender</th>
                        <th>Criminal Gender</th>
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
                        </tr>";

                    // Display data rows
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
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
                        echo '<td>';
                        if (!empty($row['image'])) {
                            echo '<img src="' . $row['image'] . '" alt="Uploaded Image" style="max-width: 100px; max-height: 100px;">';
                        } else {
                            echo 'No Image Available';
                        }
                        echo '</td>';

                        echo '<td>' . $row['STATUS'] . '</td>';

                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<h2 class='no'>No records found with the given acknowledgment number.</h2>";
                }

                // Close the database connection
                mysqli_close($con);
            }
            ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Crime Management System</p>
    </footer>
</body>

</html>