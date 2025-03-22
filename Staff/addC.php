<?php
session_start(); // Start session for login management
include '../database/db.php';


// Initialize variables as empty
$firstname = $lastname = $area = $contact = $email = $dob = "";
$ONU = $caller = $address = $remarks = "";
$firstnameErr = $dobErr = $issuetypeError = $ticketstatusErr = "";
$hasError = false;

// User Registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $area = trim($_POST['area']);
    $contact = trim($_POST['contact']);
    $email = trim($_POST['email']);
    $dob = trim($_POST['date']);
    $ONU = trim($_POST['ONU']);
    $caller = trim($_POST['caller']);
    $address = trim($_POST['address']);
    $remarks = trim($_POST['remarks']);

    // Validate account name
    if (!preg_match("/^[a-zA-Z\s-]+$/", $firstname)) {
        $firstnameErr = "Account Name should not contain numbers.";
        $hasError = true;
    }

    // Insert into database if no errors
    if (!$hasError) {
        $sql = "INSERT INTO tbl_customer (c_fname, c_lname, c_area, c_contact, c_email, c_date, c_onu, c_caller, c_address, c_rem)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        // Bind parameters correctly
        $stmt->bind_param("ssssssssss", $firstname, $lastname, $area, $contact, $email, $dob, $ONU, $caller, $address, $remarks);

        if ($stmt->execute()) {
            // Show alert and then redirect using JavaScript
            echo "<script type='text/javascript'>
                    alert('Customer has been registered successfully.');
                    window.location.href = 'customersT.php'; // Redirect to customersT.php
                  </script>";
        } else {
            die("Execution failed: " . $stmt->error);
        }
        
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/addsC.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <h2>Task Management</h2>
        <ul>
        <li><a href="staffD.php"><i class="fas fa-ticket-alt"></i> View Tickets</a></li>
        <li><a href="view_service_record.php"><i class="fas fa-box"></i> View Assets</a></li>
        <li><a href="customersT.php"><i class="fas fa-box"></i> View Customers</a></li>
        <li><a href="createTickets.php"><i class="fas fa-file-invoice"></i> Ticket Registration</a></li>
        <li><a href="registerAssets.php"><i class="fas fa-user-plus"></i>Register Assets</a></li>
            
        </ul>
        <footer>
        <a href="index.php" class="back-home"><i class="fas fa-home"></i> Back to Home</a>
        </footer>
    </div>

    <div class="container">
       
        <div class="upper">
        <h1>Add Customer</h1>
        </div>  
        
     <div class="table-box">
     <h2>Customer Profile</h2>
     <hr class="title-line"> <!-- Add this line -->

     <form action="" method="POST">
            <div class="row">
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="firstname">First Name:</label>
                    <input type="text" name="firstname" placeholder="Enter Firstname" required>
                </div>
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="lastname">Last Name:</label>
                    <input type="text" name="lastname" placeholder="Enter Lastname" required>
                </div>
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="area">Area:</label>
                    <input type="text" name="area" placeholder="Enter Area" required>
                </div>
            </div>

            <div class="row">
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="contact">Contact:</label>
                    <input type="text" name="contact" placeholder="Enter Contact" required>
                </div>
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="email">Email:</label>
                    <input type="" name="email" placeholder="Enter Email" required>
                </div>
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="date">Date:</label>
                    <input type="date" name="date" placeholder="Enter Subscription Date" required>
                </div>
            </div>

            <h2>Advance Profile</h2>
            <hr class="title-line"> <!-- Add this line -->
            <div class="secondrow">
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="contact"> ONU Name:</label>
                    <input type="text" name="ONU" placeholder="ONU Name" required>
                </div>
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="email">Caller ID:</label>
                    <input type="text" name="caller" placeholder="Caller ID" required>
                </div>
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="date">Mac Address:</label>
                    <input type="text" name="address" placeholder="Mac Address" required>
                </div>
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="date">Remarks:</label>
                    <input type="text" name="remarks" placeholder="Remarks" required>
                </div>
            </div>
            <div class="button-container">
           <button type="submit">Submit</button>
           </div>
            </form>

            </div>
          
    </div>
    


</div>
</body>
</html>

