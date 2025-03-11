<?php
session_start();
include "db.php"; 

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); 
    exit();
}

// Update the SQL query to include the user ID
$sql = "SELECT tbl_id, tbl_aname, tbl_type, tbl_status, tbl_date FROM tbl_ticket"; 
$result = $conn->query($sql); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="staffD.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <h2>Task Management</h2>
        <ul>
        <li><a href="staffD.php"><i class="fas fa-ticket-alt"></i> View Tickets</a></li>
        <li><a href="view_service_record.php"><i class="fas fa-box"></i> View Assets</a></li>
        <li><a href="createTickets.php"><i class="fas fa-file-invoice"></i> Ticket Registration</a></li>
        <li><a href="addC.php"><i class="fas fa-user-plus"></i> Add Customer</a></li>
            
        </ul>
        <footer>
        <a href="index.php" class="back-home"><i class="fas fa-home"></i> Back to Home</a>
        </footer>
    </div>

    <div class="container">
       
        <div class="upper">
        <h1>Ticket Reports</h1>
        </div>  
        
     <div class="table-box">
     <h2>Reports</h2>
     <a href="createTickets.php" class="add-user-btn"><i class="fas fa-user-plus"></i>Add Ticket</a>
     <table>
            <thead>
                <tr>
                    <th>Ticket ID</th>
                    <th>Account Name</th>
                    <th>Issue Type</th>
                    <th>Ticket Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($result->num_rows > 0) { 
                    while ($row = $result->fetch_assoc()) { 
                        echo "<tr> 
                                <td>{$row['tbl_id']}</td> 
                                <td>{$row['tbl_aname']}</td> 
                                <td>" . ucfirst(strtolower($row['tbl_type'])) . "</td> 
                                <td>" . ucfirst(strtolower($row['tbl_status'])) . "</td>
                                <td>{$row['tbl_date']}</td> 
                                 <td>
                                    <a href='edit_user.php?id={$row['tbl_id']}'><i class='fas fa-edit'></i></a>
                                    <a href='delete_user.php?id={$row['tbl_id']}'><i class='fas fa-trash'></i></a>
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
