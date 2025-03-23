<?php
session_start(); // Start session for login management
include 'db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accountNo = trim($_POST['accountNo']);
    $lastName = trim($_POST['lastName']);

    // Update the SQL query with the correct column names
    $sql = "SELECT * FROM tbl_customer WHERE c_id = ? AND c_lname = ?";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ss", $accountNo, $lastName);
    $stmt->execute();
    $result = $stmt->get_result();

    // If a matching record is found, redirect to portal.php
    if ($result->num_rows > 0) {
        // Fetch the user data if needed
        $user = $result->fetch_assoc();
        // Store user data in session if needed
        $_SESSION['user'] = $user; // Store user data in session
        header("Location: portal.php"); // Redirect to portal.php
        exit();
    } else {
        // Handle invalid login
        echo "<script>alert('Invalid Account No or Last Name. Please try again.');</script>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="customer.css"> <!-- Link to your CSS file -->
</head>
<body>
<div class="wrapper">
    <div class="form-container">
        <img src="image/customer.png" alt="Login Image" class="login-image"> <!-- Your image here -->
        <div class="vertical-line"></div> <!-- Vertical line -->
        <div class="form-content">
            <h1 class="login-title">Customer Portal</h1>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="accountNo">Account No:</label>
                    <input type="text" id="accountNo" name="accountNo" placeholder="Enter ID No." required>
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name:</label>
                    <input type="text" id="lastName" name="lastName" placeholder="Enter last name" required>
                </div>
                <button type="submit">Login</button>
                <p class="additional-info">Welcome to the Customer Portal! </p> <!-- Updated paragraph -->
            </form>
        </div>
    </div>
</div>
</body>
</html>