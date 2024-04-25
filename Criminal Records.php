<?php
include 'connection.php';
    if(isset($_POST['edit_id'])){
        echo 'yes';
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Records</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .table-wrapper {
            overflow-x: auto;
        }

        .table-wrapper table {
            /* width: 100%; */
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
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

        .edit_btn,
        .delete_btn {
            background-color: #4CAF50;
            text-decoration: none;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .edit_btn:hover,
        .delete_btn:hover {
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

        /* .dataTables_wrapper {
            background-color: lightgray; /* Change the background color as per your preference */
        /* width: 100%; */


        .dataTables_wrapper label {
            font-weight: bold;
            /* Make the font of all labels bold */

        }

        .dataTables_wrapper .dataTables_filter input,
        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_info {
            border: 1px solid #ccc;
            border-radius: 105px;
            padding: 5px 10px;
            margin-top: 10px;
        }

        .dataTables_info,
        .paginate_button {
            font-weight: bold;
            /* Make the font of the entries info and pagination buttons bold */
        }

        /* Modal styles */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
        }

        /* Close button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
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
        font-size: 35px;
        
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
    input[type=file]{
        font-size: 20px;
    }
    input[type=datetime-local]{
        font-size: 30px;
    }
    input[type=radio] {
        width: 9%;
        height: 2em;
}
    p{
        font-size: 40px;

    }
    textarea,input[type=datetime-local],input[type=file],input[type=text],input[type=number],input[type=tel]{
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
        font-size: 35px;
    }
    input[type=datetime-local]:hover,textarea:hover,input[type=file]:hover,input[type=text]:hover,input[type=tel]:hover,input[type=number]:hover{
        box-shadow: 0px 0px 10px 2px black;
        box-sizing: border-box;
    }
    textarea::placeholder,input[type=number]::placeholder,input[type=text]::placeholder,input[type=tel]::placeholder{
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
/* CSS for success message */
.success-message {
  background-color: #4CAF50; /* Green background */
  color: white; /* White text */
  text-align: center; /* Centered text */
  padding: 10px; /* Padding */
  position: fixed; /* Fixed position to stay on top */
  bottom: 20px; /* 20px from the bottom */
  left: 50%; /* Center horizontally */
  transform: translateX(-50%); /* Center horizontally */
  z-index: 999; /* Ensure it's on top of other elements */
  border-radius: 5px; /* Rounded corners */
  display: none; /* Initially hidden */
}

/* CSS for animation */
.success-message.show {
  display: block; /* Show the message */
  animation: slideIn 0.5s forwards, fadeOut 2s forwards 1s; /* Slide in and fade out animations */
}

@keyframes slideIn {
  from { bottom: -50px; opacity: 0; } /* Starting position */
  to { bottom: 20px; opacity: 1; } /* Ending position */
}

@keyframes fadeOut {
  from { opacity: 1; } /* Starting opacity */
  to { opacity: 0; } /* Ending opacity */
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
   <!-- Edit Modal -->
   <div id="editModal" class="modal">
    <h2>Edit the Record</h2>
    <div class="modal-content">
        <span class="close" onclick="closeEditModal()">&times;</span>
        <!-- Form for editing data -->
        <form  method="POST" id="edit_id" name="edit_id" action="update_record.php">
            <label for="edit_ack_no">Ack No:</label>
            <input type="text" id="edit_ack_no" name="edit_ack_no" required><br>

            <label for="edit_complaint_id">Complaint ID:</label>
            <input type="hidden" id="edit_complaint_id" name="edit_complaint_id" required><br>

            <label for="edit_witness_name">Witness Name:</label>
            <input type="text" id="edit_witness_name" name="edit_witness_name" required><br>

            <label for="edit_witness_phone">Witness Phone:</label>
            <input type="tel" id="edit_witness_phone" name="edit_witness_phone" required><br>

            <label for="edit_criminal_age">Age of Criminal:</label>
            <input type="number" id="edit_criminal_age" name="edit_criminal_age" required><br>

            <label for="edit_witness_gender">Witness Gender:</label>
            <input type="text" id="edit_witness_gender" name="edit_witness_gender" required><br>

            <label for="edit_criminal_gender">Criminal Gender:</label>
            <input type="text" id="edit_criminal_gender" name="edit_criminal_gender" required><br>

            <label for="edit_crime">Crime:</label>
            <input type="text" id="edit_crime" name="edit_crime" required><br>

            <label for="edit_city">City:</label>
            <input type="text" id="edit_city" name="edit_city" required><br>

            <label for="edit_address">Address:</label>
            <input type="text" id="edit_address" name="edit_address" required><br>

            <label for="edit_pincode">Pincode:</label>
            <input type="number" id="edit_pincode" name="edit_pincode" required><br>

            <label for="edit_state">State:</label>
            <input type="text" id="edit_state" name="edit_state" required><br>

            <label for="edit_date">Date:</label>
            <input type="datetime" id="edit_date" name="edit_date" required><br>

            <label for="edit_witness_email">Witness Email:</label>
            <input type="email" id="edit_witness_email" name="edit_witness_email" required><br>

            <label for="edit_description">Description:</label>
            <textarea id="edit_description" name="edit_description" required></textarea><br>

            <label for="edit_image">Image:</label>
            <input type="file" id="edit_image" name="edit_image" ><br>

            <label for="edit_status">Status:</label>
            <input type="text" id="edit_status" name="edit_status" required><br>

            <button type="submit" name="edit_id" id="edit_id">Save Changes</button>
        </form>
    </div>
</div>

<div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form action="delete.php" method="post" name="delete" id="delete">
            <p>Are you sure you want to delete this record?</p>
            <label for="delete_complaint_id">Complaint ID:</label>
            <input type="text" id="delete_complaint_id" name="delete_complaint_id"><br>

            <button class="delete_btn" name="delete" id="delete_id" onclick="handleDeleteButtonClick(<?php echo $row['complaint_id']; ?>)">Delete</button>
            
</form>
        </div>
    </div> 

    <main>
        <div id="cont">
            <h2 id="founder">Criminal Records</h2>
            <div class="table-wrapper">
                <div class="dataTables_wrapper">
                    <table class="table" id="myTable">
                        <thead>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- PHP code to fetch and display records -->
                            <?php
                            // Include your database connection code here
                            $servername = 'localhost';
                            $username = "root";
                            $password = "";
                            $database_name = "dbtrailmine";

                            // Create a connection
                            $con = mysqli_connect($servername, $username, $password, $database_name);

                            // Check connection
                            if (!$con) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            // Fetching data from the table
                            $sql = "SELECT * FROM `complaints_details`";
                            $result = mysqli_query($con, $sql);

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
                                    
                                    echo '<td>'; 
if (!empty($row['image'])) {
    echo '<img src="' . $row['image'] . '" alt="Uploaded Image" style="max-width: 100px; max-height: 100px;">';
} else {
    echo 'No Image Available';
}
echo '</td>';

                                    echo '<td>' . $row['STATUS'] . '</td>';
                                    echo '<td>
            <button id="edit_id" class="edit_btn" onclick="openEditModal(' . $row['complaint_id'] . ')" role="button">Edit</button>
            <button class="delete_btn">Delete</button>
        </td>';
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

        </div>
    </main>
    <footer>
        &copy; <?php echo date("Y"); ?> Crime Management System
    </footer>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "columnDefs": [{
                        "orderable": true,
                        "targets": [0, 1]
                    }, // Allow sorting for ack_no and complaint_id columns
                    {
                        "orderable": false,
                        "targets": "_all"
                    } // Disable sorting for all other columns
                ],
                "order": [
                    [0, "asc"]
                ] // Set initial sorting to ack_no column
            });


        });
        // Get the modals
        var editModal = document.getElementById("editModal");
        var deleteModal = document.getElementById("deleteModal");

        // Get the button that opens the modals
        var editButtons = document.querySelectorAll(".edit_btn");
        var deleteButtons = document.querySelectorAll(".delete_btn");

        // Get the <span> element that closes the modals
        var closeButtons = document.querySelectorAll(".close");

        // When the user clicks on the button, open the corresponding modal
        editButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                editModal.style.display = "block";
            });
        });

        deleteButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                deleteModal.style.display = "block";
            });
        });

        // When the user clicks on <span> (x), close the modals
        closeButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                editModal.style.display = "none";
                deleteModal.style.display = "none";
            });
        });

        // When the user clicks anywhere outside of the modal, close it
        window.addEventListener("click", function(event) {
            if (event.target == editModal || event.target == deleteModal) {
                editModal.style.display = "none";
                deleteModal.style.display = "none";
            }
        });
        // Function to populate the edit modal with data
        function populateEditModal(id, first_name, last_name, f_name, ph_no, age, gender, crime, city, Address, pin, state, date, email, desc, image) {
            document.getElementById('edit_id').value = id;
            document.getElementById('first_name').value = first_name;
            // Populate other fields similarly
            // Example: document.getElementById('last_name').value = last_name;
        }

        // Function to open the edit modal
        function openEditModal(ack, first_name, last_name, f_name, ph_no, age, gender, crime, city, Address, pin, state, date, email, desc, image) {
            populateEditModal(ack, first_name, last_name, f_name, ph_no, age, gender, crime, city, Address, pin, state, date, email, desc, image);
            document.getElementById('editModal').style.display = 'block';
        }

        // Function to close the edit modal
        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }
    </script>
    <script>
        edits = document.getElementsByClassName('edit_btn');
        Array.from(edits).forEach((element)=>{
            element.addEventListener("click", (e)=>{
                console.log("edit_btn", );
                tr = e.target.parentNode.parentNode;
                ack = tr.getElementsByTagName("td")[0].innerText;
                comp_id = tr.getElementsByTagName("td")[1].innerText;
                Wit_name = tr.getElementsByTagName("td")[2].innerText;
                Wit_phno = tr.getElementsByTagName("td")[3].innerText;
                age = tr.getElementsByTagName("td")[4].innerText;
                Wit_gen = tr.getElementsByTagName("td")[5].innerText;
                crim_gen = tr.getElementsByTagName("td")[6].innerText;
                crime = tr.getElementsByTagName("td")[7].innerText;
                city = tr.getElementsByTagName("td")[8].innerText;
                address = tr.getElementsByTagName("td")[9].innerText;
                pin = tr.getElementsByTagName("td")[10].innerText;
                state = tr.getElementsByTagName("td")[11].innerText;
                date = tr.getElementsByTagName("td")[12].innerText;
                Wit_email = tr.getElementsByTagName("td")[13].innerText;
                desc = tr.getElementsByTagName("td")[14].innerText;
                image = tr.getElementsByTagName("td")[15].innerText;
                status = tr.getElementsByTagName("td")[16].innerText;
                console.log(ack,comp_id,Wit_name,Wit_phno,age,Wit_gen,crim_gen,crime,city,address,pin,state,date,Wit_email,desc,image,status);
                edit_ack_no.value = ack;
                edit_complaint_id.value = comp_id;
                edit_witness_name.value = Wit_name;
                edit_witness_phone.value = Wit_phno;
                edit_criminal_age.value = age;
                edit_witness_gender.value = Wit_gen;
                edit_criminal_gender.value = crim_gen;
                edit_crime.value = crime;
                edit_city.value = city;
                edit_address.value = address;
                edit_pincode.value = pin;
                edit_state.value = state;
                edit_date.value = date;
                edit_witness_email.value = Wit_email;
                edit_description.value = desc;
                edit_image.value = image;
                edit_status.value = status;
            })
        })
        
        deletes = document.getElementsByClassName('delete_btn');
        Array.from(deletes).forEach((element)=>{
            element.addEventListener("click", (e)=>{
                console.log("delete_btn", );
                tr = e.target.parentNode.parentNode;
                comp_id = tr.getElementsByTagName("td")[1].innerText;
                delete_complaint_id.value = comp_id;
            })
        })
        
    </script>
    <script>
    // Function to handle delete button click
    function handleDeleteButtonClick(sno) {
        // Make an AJAX request to delete.php with the record ID
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete.php');
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                // If deletion was successful, remove the row from the table
                const row = document.getElementById('row_' + sno);
                if (row) {
                    row.remove();
                }
                // Log success message to console
                console.log(xhr.responseText);
            } else {
                // If deletion failed, log the error
                console.error('Error deleting record:', xhr.responseText);
            }
        };
        xhr.send('SNO=' + encodeURIComponent(sno));
    }
</script>

    <!-- <script>
  $(document).ready(function () {
    $('#myTable').
  });
</script> -->
<script>
    // After successful deletion
document.getElementById('deleteSuccessMessage').classList.add('show');

</script>
</body>

</html>