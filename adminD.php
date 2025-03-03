<?php
include 'db.php'; // Include database connection
session_start();

// Fetch registered users without the created_at column
$sql = "SELECT u_fname, u_lname, u_email, u_username, u_type, u_status FROM tbl_user";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
    <link rel="stylesheet" href="adminD.css"> <!-- Link to your CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome -->
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
 
        <h2>Task Management</h2>
        <ul>
            <li><a href="view_users.php"><i class="fas fa-users"></i> View Users</a></li>
            <li><a href="view_service_record.php"><i class="fas fa-file-alt"></i> View Service Record</a></li>
            <li><a href="view_incident_report.php"><i class="fas fa-exclamation-triangle"></i> View Incident Report</a></li>
            <li><a href="view_logs.php"><i class="fas fa-book"></i> View Logs</a></li>
        </ul>
        <a href="index.php" class="back-home"><i class="fas fa-home"></i> Back to Home</a>
    </div>
    <div class="container">
        <h1>ADMINDASHBOARD</h1>
        <table>
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>User Type</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['u_fname']}</td>
                                <td>{$row['u_lname']}</td>
                                <td>{$row['u_email']}</td>
                                <td>{$row['u_username']}</td>
                                <td>{$row['u_type']}</td>
                                <td>{$row['u_status']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No users found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>

<?php
$conn->close(); // Close the database connection
?>