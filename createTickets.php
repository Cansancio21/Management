<?php

session_start(); // Start session for login management
include 'db.php';

// Initialize variables as empty
$accountname = $issuedetails = $dob = "";
$issuetype = $ticketstatus = ""; 

$accountnameErr = $dobErr = $issuetypeError = $ticketstatusErr = "";
$hasError = false;
$successMessage = "";

// User Registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accountname = trim($_POST['account_name']);
    $issuedetails = trim($_POST['ticket_details']);
    $issuetype = trim($_POST['issue_type']);
    $ticketstatus = trim($_POST['ticket_status']);
    $dob = trim($_POST['date']);

    // Validate account name
    if (!preg_match("/^[a-zA-Z\s-]+$/", $accountname)) {
        $accountnameErr = "Account Name should not contain numbers.";
        $hasError = true;
    }

    // Insert into database if no errors
    if (!$hasError) {
        $sql = "INSERT INTO tbl_ticket (t_aname, t_details, t_type, t_status, t_date)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        // Bind parameters correctly
        $stmt->bind_param("sssss", $accountname, $issuedetails, $issuetype, $ticketstatus, $dob);

        if ($stmt->execute()) {
            // Show alert and then redirect using JavaScript
            echo "<script type='text/javascript'>
                    alert('Ticket has been Registered successfully.');
                    window.location.href = 'staffD.php'; // Redirect to staffD.php
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
    <title>Ticket Registration</title>
    <link rel="stylesheet" href="create.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
     <div class="wrapper">
       <div class="container">
       <a href="staffD.php" class="back-icon">
            <i class='bx bx-arrow-back'></i>
        </a>
        <h1>Ticket Incident Registration</h1>
        <form method="POST" action="" class="form">
                <div class="form-row">
                    <label for="account_name">Account Name:</label>
                    <input type="text" id="account_name" name="account_name" placeholder="Account Name" required>
                </div>
                <div class="form-row">
                    <label for="issue_type">Issue Type:</label>
                    <select id="issue_type" name="issue_type" required>
                        <option value="Critical">Critical</option>
                        <option value="Minor">Minor</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="ticket_status">Ticket Status:</label>
                    <select id="ticket_status" name="ticket_status" required>
                        <option value="Open">Open</option>
                        <option value="Closed">Closed</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="ticket_details">Ticket Details:</label>
                    <textarea name="ticket_details" id="ticket_details"></textarea>
                </div>
                <div class="form-row">
                    <label for="date">Date Issued:</label>
                    <input type="date" id="date" name="date" required>
                </div>
            
            <button type="submit">Submit Ticket</button>
        </form>
        
     </div>
</body>
</html>
