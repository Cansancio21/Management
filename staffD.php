<?php
session_start();

 
include "db.php"; 

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); 
    exit();
}

// Fetch staff information from the database
$username = $_SESSION['username'];
$sql = "SELECT u_fname, u_lname, u_email FROM tbl_user WHERE u_username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($firstName, $lastName, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <link rel="stylesheet" href="staff.css"> 
</head>
<body>
    <div class="dashboard">
        <nav class="sidebar">
            <h2 class="logo">Dashboard</h2>
            <ul>
                <li><a href="staff.php">Home</a></li>
                <li><a href="view_tasks.php">View Tasks</a></li>
                <li><a href="update_profile.php">Update Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <div class="main-content">
            <h2>Staff Dashboard</h2>
            <h3>Your Information</h3>
            <table>
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo htmlspecialchars($firstName); ?></td>
                        <td><?php echo htmlspecialchars($lastName); ?></td>
                        <td><?php echo htmlspecialchars($email); ?></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</body>
</html>