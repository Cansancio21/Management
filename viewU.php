<?php 
include 'db.php'; 
session_start(); 

// Check if the user is logged in
if (!isset($_SESSION['username'])) { 
    header("Location: index.php"); // Redirect to login page if not logged in 
    exit(); 
}

$firstName = '';
$userType = '';

// Check database connection
if ($conn) {
    // Fetch user data based on the logged-in username
    $sqlUser  = "SELECT u_fname, u_type FROM tbl_user WHERE u_username = ?";
    $stmt = $conn->prepare($sqlUser );
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();
    $resultUser  = $stmt->get_result();

    if ($resultUser ->num_rows > 0) {
        $row = $resultUser ->fetch_assoc();
        $firstName = $row['u_fname'];
        $userType = $row['u_type'];
    }

    // Fetch all users data
    $sql = "SELECT u_id, u_fname, u_lname, u_email, u_username, u_type, u_status FROM tbl_user"; 
    $result = $conn->query($sql); 
} else {
    echo "Database connection failed.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="viewu.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
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
        <h1>Registered Users</h1>
        </div>  
        <div class="search-container">
            <input type="text" class="search-bar" placeholder="Search...">
            <span class="search-icon">🔍</span> <!-- Replace with your icon -->
        </div>
        
     <div class="table-box">
     <?php if ($userType === 'admin'): ?>
                <div class="username">
                    Welcome Back, <?php echo htmlspecialchars($firstName); ?>!
                    <i class="fas fa-user-shield admin-icon"></i> <!-- Admin icon -->
                </div>
            <?php endif; ?>
     <h2>Users</h2>
     <a href="addU.php" class="add-user-btn"><i class="fas fa-user-plus"></i> Add User</a>
     <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($result->num_rows > 0) { 
                    while ($row = $result->fetch_assoc()) { 
                        echo "<tr> 
                                <td>{$row['u_id']}</td> 
                                <td>{$row['u_fname']}</td> 
                                <td>{$row['u_lname']}</td> 
                                <td>{$row['u_email']}</td> 
                                <td>{$row['u_username']}</td> 
                                <td>" . ucfirst(strtolower($row['u_type'])) . "</td> 
                                <td>" . ucfirst(strtolower($row['u_status'])) . "</td>
                                 <td>
                                    <a href='editU.php?id={$row['u_id']}'><i class='fas fa-edit'></i></a>
                                    <a href='deleteU.php?id={$row['u_id']}'><i class='fas fa-trash'></i></a>
                                </td>
                              </tr>"; 
                    } 
                } else { 
                    echo "<tr><td colspan='7'>No users found.</td></tr>"; 
                } 
                ?>
            </tbody>
        </table>
     </div>
    </div>
</div>
</body>
</html>

<?php 
$conn->close(); // Close the database connection 
?>
