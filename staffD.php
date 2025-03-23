<?php
session_start();
include 'db.php';



// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); 
    exit();
}

$firstName = '';
$userType = '';

// Fetch user data based on the logged-in username
if ($conn) {
    $sqlUser   = "SELECT u_fname, u_type FROM tbl_user WHERE u_username = ?";
    $stmt = $conn->prepare($sqlUser );
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();
    $resultUser   = $stmt->get_result();

    if ($resultUser ->num_rows > 0) {
        $row = $resultUser ->fetch_assoc();
        $firstName = $row['u_fname'];
        $userType = $row['u_type'];
    }

    // Fetch ticket data
    $sql = "SELECT t_id, t_aname, t_type, t_status, t_details, t_date FROM tbl_ticket"; 
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
    <link rel="stylesheet" href="staffD.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@latest/css/boxicons.min.css'> 
</head>
<body>
<div class="wrapper">
<div class="sidebar">
    <h2>Task Management</h2>
    <ul>
        <li>
            <a href="staffD.php"><i class="fas fa-ticket-alt"></i> View Tickets</a>
            <span class="toggle-arrow" onclick="toggleSubMenu('ticketsSubMenu')">
                <i class='bx bx-chevron-down'></i>
            </span>
            <ul class="sub-menu" id="ticketsSubMenu" style="display: none;">
                <li><a href="createTickets.php"><i class="fas fa-file-invoice"></i> Ticket Registration</a></li>
            </ul>
        </li>
        <li>
            <a href="assetsT.php"><i class="fas fa-user-plus"></i> View Assets</a>
            <span class="toggle-arrow" onclick="toggleSubMenu('assetsSubMenu')">
                <i class='bx bx-chevron-down'></i>
            </span>
            <ul class="sub-menu" id="assetsSubMenu" style="display: none;">
                <li><a href="registerAssets.php"><i class="fas fa-user-plus"></i> Register Assets</a></li>
            </ul>
        </li>
        <li>
            <a href="customersT.php"><i class="fas fa-box"></i> View Customers</a>
            <span class="toggle-arrow" onclick="toggleSubMenu('customersSubMenu')">
                <i class='bx bx-chevron-down'></i>
            </span>
            <ul class="sub-menu" id="customersSubMenu" style="display: none;">
                <li><a href="addC.php"><i class="fas fa-user-plus"></i> Add Customer</a></li>
            </ul>
        </li>
    </ul>
    <footer>
        <a href="index.php" class="back-home"><i class="fas fa-home"></i> Back to Home</a>
    </footer>
</div>

    <div class="container">
        <div class="upper">
            <h1>Ticket Reports</h1>
        </div>  
        <div class="search-container">
            <input type="text" class="search-bar" placeholder="Search...">
            <span class="search-icon">🔍</span> <!-- Replace with your icon -->
        </div>

        <div class="table-box">
            <?php if ($userType === 'staff'): ?>
                <div class="username">
                    Welcome Back, <?php echo htmlspecialchars($firstName); ?>!
                    <i class="fas fa-user-shield admin-icon"></i> <!-- Admin icon -->
                </div>
            <?php endif; ?>
            <h2>Reports</h2>
            <a href="createTickets.php" class="ticket-btn"><i class="fas fa-user-plus"></i>Add Ticket</a>
            <a href="createTickets.php" class="export-btn"><i class="fas fa-download"></i>Export</a>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Account Name</th>
                        <th>Issue Type</th>
                        <th>Ticket Status</th>
                        <th>Ticket Details</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if ($result->num_rows > 0) { 
                        while ($row = $result->fetch_assoc()) { 
                            echo "<tr> 
                                    <td>{$row['t_id']}</td> 
                                    <td>{$row['t_aname']}</td> 
                                    <td>" . ucfirst(strtolower($row['t_type'])) . "</td> 
                                    <td>" . ucfirst(strtolower($row['t_status'])) . "</td>
                                    <td>" . ucfirst(strtolower($row['t_details'])) . "</td>
                                    <td>{$row['t_date']}</td> 
                                    <td>
                                        <a href='editT.php?id={$row['t_id']}'><i class='fas fa-edit'></i></a>
                                        <a href='deleteT.php?id={$row['t_id']}'><i class='fas fa-trash'></i></a>
                                    </td>
                                  </tr>"; 
                        } 
                    } else { 
                        echo "<tr><td colspan='7'>No tickets found.</td></tr>"; 
                    } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Include the JavaScript file -->
<script src="staff.js"></script>
</body>
</html>

<?php 
$conn->close(); // Close the database connection 
?>