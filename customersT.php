<?php
session_start();
include "db.php"; 

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); 
    exit();
}

// Fetch customer data
$sql = "SELECT c_id, c_fname, c_lname, c_area, c_contact, c_email, c_onu, c_caller, c_address, c_rem FROM tbl_customer"; 
$result = $conn->query($sql); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="customersT.css"> 
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
            <li><a href="addC.php"><i class="fas fa-user-plus"></i> Register Assets</a></li>     
        </ul>
        <footer>
            <a href="index.php" class="back-home"><i class="fas fa-home"></i> Back to Home</a>
        </footer>
    </div>

    <div class="container">
        <div class="upper">
            <h1>Customers Info</h1>
        </div>  
        
        <div class="table-box">
            <h2>Reports</h2>
            <a href="addC.php" class="add-btn"><i class="fas fa-user-plus"></i> Add Customer</a>
            <table>
                <thead>
                    <tr>
                        <th>Customer Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Area</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>ONU Name</th>
                        <th>Caller ID</th>
                        <th>Mac Address</th>
                        <th>Remarks</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if ($result->num_rows > 0) { 
                        while ($row = $result->fetch_assoc()) { 
                            echo "<tr> 
                                    <td>{$row['c_id']}</td> 
                                    <td>{$row['c_fname']}</td> 
                                    <td>{$row['c_lname']}</td> 
                                    <td>{$row['c_area']}</td> 
                                    <td>{$row['c_contact']}</td> 
                                    <td>{$row['c_email']}</td> 
                                    <td>{$row['c_onu']}</td> 
                                    <td>{$row['c_caller']}</td> 
                                    <td>{$row['c_address']}</td> 
                                    <td>{$row['c_rem']}</td> 
                                    <td>
                                        <a href='edit_customer.php?id={$row['c_id']}'><i class='fas fa-edit'></i></a>
                                        <a href='delete_customer.php?id={$row['c_id']}'><i class='fas fa-trash'></i></a>
                                    </td>
                                  </tr>"; 
                        } 
                    } else { 
                        echo "<tr><td colspan='11'>No customers found.</td></tr>"; 
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