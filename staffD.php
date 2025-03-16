<?php
session_start();
include "db.php"; // Corrected path


// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); 
    exit();
}
if ($conn) {
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
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <h2>Task Management</h2>
        <ul>
        <li><a href="staffD.php"><i class="fas fa-ticket-alt"></i> View Tickets</a></li>
        <li><a href="view_service_record.php"><i class="fas fa-box"></i> View Assets</a></li>
        <li><a href="customersT.php"><i class="fas fa-box"></i> View Customers</a></li>
        <li><a href="createTickets.php"><i class="fas fa-file-invoice"></i> Ticket Registration</a></li>
        <li><a href="addC.php"><i class="fas fa-user-plus"></i> Add Customer</a></li>
        <li><a href="addC.php"><i class="fas fa-user-plus"></i>Register Assets</a></li>     
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
     <a href="createTickets.php" class="ticket-btn"><i class="fas fa-user-plus"></i>Add Ticket</a>
     <table>
            <thead>
                <tr>
                    <th>Ticket ID</th>
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
                    <td>" , ucfirst(strtolower($row['t_details'])) , "</td>
                    <td>{$row['t_date']}</td> 
                    <td>
                        <a href='edit_user.php?id={$row['t_id']}'><i class='fas fa-edit'></i></a>
                        <a href='delete_user.php?id={$row['t_id']}'><i class='fas fa-trash'></i></a>
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
