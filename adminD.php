<?php 
include 'db.php'; 
session_start(); 

// Check if the user is logged in
if (!isset($_SESSION['username'])) { 
    header("Location: index.php"); // Redirect to login page if not logged in 
    exit(); 
}

// Update the SQL query to include the user ID
$sql = "SELECT u_id, u_fname, u_lname, u_email, u_username, u_type, u_status FROM tbl_user"; 
$result = $conn->query($sql);

// Initialize counters
$totalUsers = 0;
$totalActive = 0;
$totalPending = 0;

// Get the first name of the logged-in user
$firstName = '';
$userType = '';

if ($result) {
    $totalUsers = $result->num_rows; // Total registered users
    while ($row = $result->fetch_assoc()) {
        if ($row['u_status'] === 'active') {
            $totalActive++;
        } elseif ($row['u_status'] === 'pending') {
            $totalPending++;
        }
        // Get the first name and user type of the logged-in user
        if ($row['u_username'] === $_SESSION['username']) {
            $firstName = $row['u_fname'];
            $userType = $row['u_type'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="adminD.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"> <!-- Include Boxicons -->
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <h2>Task Management</h2>
        <ul>
            <li><a href="adminD.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="viewU.php"><i class="fas fa-users"></i> View Users</a></li>
            <li><a href="view_service_record.php"><i class="fas fa-file-alt"></i> View Service Record</a></li>
            <li><a href="view_incident_report.php"><i class="fas fa-exclamation-triangle"></i> View Incident Report</a></li>
            <li><a href="view_logs.php"><i class="fas fa-book"></i> View Logs</a></li>
        </ul>
        <footer>
            <a href="index.php" class="back-home"><i class="fas fa-home"></i> Back to Home</a>
        </footer>
    </div>

    <div class="container">
        <div class="upper">
        <div class="search-container">
    <input type="text" class="search-bar" placeholder="Search...">
    <span class="search-icon">🔍</span> <!-- Replace with your icon -->

    <a href="settings.php" class="settings-link">
                <i class='bx bx-cog'></i>
                <span>Settings</span>
            </a>
</div>

</div>
</div>
        <div class="table-box">

        <?php if ($userType === 'admin'): ?>
                <div class="username">
                    Welcome Back, <?php echo htmlspecialchars($firstName); ?>!
                    <i class="fas fa-user-shield admin-icon"></i> <!-- Admin icon -->
                </div>
            <?php endif; ?>
            <div class="stats">
                <div class="stat">
                    <h3>Total Registered Users</h3>
                    <p><?php echo $totalUsers; ?></p>
                </div>
                <div class="stat">
                    <h3>Total Active Users</h3>
                    <p><?php echo $totalActive; ?></p>
                </div>
                <div class="stat">
                    <h3>Total Pending Users</h3>
                    <p><?php echo $totalPending; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php 
$conn->close(); // Close the database connection 
?>
