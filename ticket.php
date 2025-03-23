<?php
include 'db.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $c_id = htmlspecialchars($_POST['c_id']);
    $c_lname = htmlspecialchars($_POST['c_lname']);
    $c_fname = htmlspecialchars($_POST['c_fname']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    $type = htmlspecialchars($_POST['type']); // Get ticket type (Critical or Minor)

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO tbl_supp_tickets (c_id, c_lname, c_fname, s_subject, s_message, s_type, s_status) 
                             VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    // Set the default status to "Open"
    $status = "Open";

    // Bind parameters
    $stmt->bind_param("issssss", $c_id, $c_lname, $c_fname, $subject, $message, $type, $status);

    // Execute the statement
    if ($stmt->execute()) {
        echo "success"; // If the insert is successful
    } else {
        echo "Error: " . $stmt->error; // If there is an error
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>