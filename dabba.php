<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Form</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
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

        .edit_btn, .delete_btn {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .edit_btn:hover, .delete_btn:hover {
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
            <img class="rotate" src="ashok.jpg" alt="LOGO">
        </div>
        <div class="items">
            <ul class="cta-buttons">
                <a href="#" class="btn"style="background-color: aliceblue; color: black;">Home</a>
                <a href="complaint.html" class="btn">Register a complaint</a>
                <a href="Criminal Records.php" class="btn">Complaint Records</a>
                <a href="contact_us.html" class="btn">Contact us</a>
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
                    <th>SNO</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Message</th>
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
                $sql = "SELECT * FROM `contactus_details`";
                $result =  mysqli_query($con, $sql);

                // Display the rows returned by the SQL query
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['SNO'] . '</td>';
                        echo '<td>' . $row['FNAME'] . '</td>';
                        echo '<td>' . $row['LNAME'] . '</td>';
                        echo '<td>' . $row['EMAIL'] . '</td>';
                        echo '<td>' . $row['MESSAGE'] . '</td>';
                        echo '<td><a href="complaint.php" role="button" class="edit_btn">Edit</a> <button class="delete_btn">Delete</button></td>';
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
    </div>
</main>
<footer>
    &copy; <?php echo date("Y"); ?> Crime Management System
</footer>
<!-- Edit Form Popup -->
<div id="editFormPopup" class="edit-form-popup">
    <div class="edit-form-content">
        <span class="close">&times;</span>
        <h2>Edit Record</h2>
        <!-- Form for editing record -->
        <form id="editForm" action="edit.php" method="post">
            <!-- Input fields for editing record -->
            <input type="hidden" id="edit_sno" name="SNO">
            <label for="edit_fname">First Name:</label>
            <input type="text" id="edit_fname" name="FNAME">
            <label for="edit_lname">Last Name:</label>
            <input type="text" id="edit_lname" name="LNAME">
            <label for="edit_email">Email:</label>
            <input type="email" id="edit_email" name="EMAIL">
            <label for="edit_message">Message:</label>
            <textarea id="edit_message" name="MESSAGE"></textarea>
            <button type="submit">Save Changes</button>
        </form>
    </div>
</div>
<script>
    // JavaScript code to handle edit button click and show edit form popup
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.edit_btn');

        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const row = button.closest('tr');
                const sno = row.querySelector('td:nth-child(1)').innerText;
                const fname = row.querySelector('td:nth-child(2)').innerText;
                const lname = row.querySelector('td:nth-child(3)').innerText;
                const email = row.querySelector('td:nth-child(4)').innerText;
                const message = row.querySelector('td:nth-child(5)').innerText;

                const editFormPopup = document.getElementById('editFormPopup');
                const editForm = document.getElementById('editForm');

                editForm.querySelector('#edit_sno').value = sno;
                editForm.querySelector('#edit_fname').value = fname;
                editForm.querySelector('#edit_lname').value = lname;
                editForm.querySelector('#edit_email').value = email;
                editForm.querySelector('#edit_message').value = message;

                editFormPopup.style.display = 'block';
            });
        });

        // Close edit form popup when user clicks the close button
        const closeBtn = document.querySelector('.close');
        closeBtn.addEventListener('click', function() {
            const editFormPopup = document.getElementById('editFormPopup');
            editFormPopup.style.display = 'none';
        });

        // Close edit form popup when user clicks outside of it
        window.addEventListener('click', function(event) {
            const editFormPopup = document.getElementById('editFormPopup');
            if (event.target === editFormPopup) {
                editFormPopup.style.display = 'none';
            }
        });
    });
        // Select all delete buttons
        const deleteButtons = document.querySelectorAll('.delete_btn');

        // Attach event listeners to delete buttons
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Find the row containing the clicked button
                const row = button.closest('tr');
                const sno = row.querySelector('td:nth-child(1)').innerText;

                // Make an AJAX request to delete the record
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'delete.php');
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        // If deletion was successful, remove the row from the table
                        row.remove();
                    } else {
                        // If deletion failed, log the error
                        console.error('Error deleting record:', xhr.responseText);
                    }
                };
                xhr.send('SNO=' + encodeURIComponent(sno));
            });
        });
    
</script>



</body>
</html>
<?php
// Establish database connection here
include 'connection.php';
// Assuming you have established a database connection and your table name is 'complaints'

if(isset($_POST['submit'])) {
    $ack_no = $_POST['ack_no'];

    // Perform SQL query to fetch data based on acknowledgment number
    $sql = "SELECT * FROM complaints_details WHERE ack_no = '$ack_no'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0) {
        // Display table header
        echo "<table border='1'>
            <tr>
            <th>Ack no</th>
            <th>Complaint ID</th>
            <th>Witness Name</th>
            <th>Witness Phone no</th>
            <th>Age of Criminal(Approx)</th>
            <th>Witness Gender</th>
            <th>CriminalGender</th>
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
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo'<td>' . $row['ack_no'] . '</td>';
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
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found with the given acknowledgment number.";
    }

    // Close the database connection
    mysqli_close($con);
}
?>
