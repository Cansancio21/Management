<?php 
include 'db.php'; 
session_start(); 

// Check if the user is logged in
if (!isset($_SESSION['username'])) { 
    header("Location: index.php"); // Redirect to login page if not logged in 
    exit(); 
}

$username = $_SESSION['username'];
$firstName = '';
$userType = '';
$avatarPath = 'default-avatar.png'; // Default avatar
$avatarFolder = 'uploads/avatars/';

// Check if user has a custom avatar
$userAvatar = $avatarFolder . $username . '.png';
if (file_exists($userAvatar)) {
    $avatarPath = $userAvatar . '?' . time(); // Force browser to reload new image
}

if ($conn) {
    // Fetch user data based on the logged-in username
    $sqlUser  = "SELECT u_fname, u_type FROM tbl_user WHERE u_username = ?";
    $stmt = $conn->prepare($sqlUser );
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $resultUser  = $stmt->get_result();

    if ($resultUser ->num_rows > 0) {
        $row = $resultUser ->fetch_assoc();
        $firstName = $row['u_fname'];
        $userType = $row['u_type'];
    }

    // Pagination logic
    $limit = 10; // Number of users per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
    $offset = ($page - 1) * $limit; // Offset for SQL query

    // Fetch total number of users
    $totalUsersQuery = "SELECT COUNT(*) as total FROM tbl_user";
    $totalResult = $conn->query($totalUsersQuery);
    $totalRow = $totalResult->fetch_assoc();
    $totalUsers = $totalRow['total'];
    $totalPages = ceil($totalUsers / $limit); // Total pages

    // Fetch users for the current page
    $sql = "SELECT u_id, u_fname, u_lname, u_email, u_username, u_type, u_status FROM tbl_user LIMIT ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $offset, $limit);
    $stmt->execute();
    $result = $stmt->get_result(); 
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
    <link rel="stylesheet" href="viewU.css"> 
    <link href="https://cdn.jsdelivr.net/npm/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
    <style>
        .table-box {
            display: flex;
            flex-direction: column;
        }

        /* Keep the table content to the top, and push the pagination to the bottom */
        .table-box table {
            flex-grow: 1; /* This will make the table take up the available space */
            margin-bottom: 10px; /* Ensure space for pagination */
        }

        /* Pagination styling */
        .pagination {
            text-align: center; /* Center the pagination links */
            padding: 10px 0;
            width: 100%; /* Full width */
            margin-left: 45%;
        }

        .pagination-link {
            display: inline-block;
            margin: 0 5px;
            padding: 8px 12px;
            background-color: #007bff; /* Bootstrap primary color */
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .pagination-link:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }

        .pagination-link.active {
            background-color: #0056b3; /* Active page color */
            font-weight: bold; /* Bold text for active page */
        }

        .disabled {
            background-color: #ccc; /* Gray background for disabled */
            pointer-events: none; /* Disable click events */
            color: #666; /* Gray text */
        }
    </style>
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
            <span class="search-icon">🔍</span> 
        </div>

        <div class="user-icon">
    <?php if (!empty($avatarPath)): ?>
        <img src="<?php echo htmlspecialchars($avatarPath, ENT_QUOTES, 'UTF-8') . '?v=' . time(); ?>" 
            alt="" 
            style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
            
    <?php else: ?>
        <i class='bx bxs-user-circle' style="font-size: 40px; color: #555;"></i>
    <?php endif; ?>
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
                        echo "<tr><td colspan='8'>No users found.</td></tr>"; 
                    } 
                    ?>
                </tbody>
            </table>

            <!-- Pagination Controls -->
            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="?page=<?php echo $page - 1; ?>" class="pagination-link">&lt;</a> <!-- Less than symbol -->
                <?php else: ?>
                    <span class="pagination-link disabled">&lt;</span> <!-- Disabled less than symbol -->
                <?php endif; ?>

                <?php if ($page < $totalPages): ?>
                    <a href="?page=<?php echo $page + 1; ?>" class="pagination-link">&gt;</a> <!-- Greater than symbol -->
                <?php else: ?>
                    <span class="pagination-link disabled">&gt;</span> <!-- Disabled greater than symbol -->
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php 
$conn->close(); // Close the database connection 
?>