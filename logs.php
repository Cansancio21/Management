<?php
include 'db.php'; // Include database connection

// Start session to access user data
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: customerP.php"); // Redirect to login if not logged in
    exit();
}

$user = $_SESSION['user']; 


$is_staff = isset($user['staff_id']); 

// Extract the necessary data for logging
$c_id = htmlspecialchars($user['c_id']);
$c_lname = htmlspecialchars($user['c_lname']);
$c_fname = htmlspecialchars($user['c_fname']);
$username = $c_fname . ' ' . $c_lname; // Assuming staff's first and last name are stored in these fields

// Function to log user actions
function logUserAction($conn, $description) {
    $stmt = $conn->prepare("INSERT INTO tbl_logs (l_stamp, l_description) VALUES (NOW(), ?)");
    $stmt->bind_param("s", $description);
    $stmt->execute();
    $stmt->close();
}

// Log user login based on whether they are a staff member or a customer
if ($is_staff) {
    logUserAction($conn, "User '$username' has successfully logged in");
} else {
    // Fetch the latest ticket subject for the customer (acting as a reference)
    $ticketQuery = "SELECT s_subject FROM tbl_supp_tickets WHERE c_id = ? ORDER BY id ASC LIMIT 1";
    $stmt = $conn->prepare($ticketQuery);
    $stmt->bind_param("s", $c_id);
    $stmt->execute();
    $ticketResult = $stmt->get_result();

    if ($ticketResult && $ticketResult->num_rows > 0) {
        $ticketRow = $ticketResult->fetch_assoc();
        $ticket_subject = htmlspecialchars($ticketRow['s_subject']);
        logUserAction($conn, "User '$c_fname $c_lname' created a ticket with subject: $ticket_subject");
    } else {
        logUserAction($conn, "User '$c_fname $c_lname' attempted to create a ticket, but no record was found.");
    }
    $stmt->close();
}

// Fetch all logs for display
$logQuery = "SELECT l_stamp, l_description FROM tbl_logs ORDER BY l_stamp ASC";
$logResult = $conn->query($logQuery);

if (!$logResult) {
    die("Query Failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="log.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <h2>Task Management</h2>
        <ul>
            <li><a href="staffD.php"><i class="fas fa-ticket-alt"></i> View Tickets</a></li>
            <li><a href="view_service_record.php"><i class="fas fa-box"></i> View Assets</a></li>
            <li><a href="customersT.php"><i class="fas fa-users"></i> View Customers</a></li>
            <li><a href="createTickets.php"><i class="fas fa-file-invoice"></i> Ticket Registration</a></li>
            <li><a href="registerAssets.php"><i class="fas fa-plus-circle"></i> Register Assets</a></li>
        </ul>
        <footer>
            <a href="index.php" class="back-home"><i class="fas fa-home"></i> Back to Home</a>
        </footer>
    </div>

    <div class="container">
        <div class="upper">
            <h1>User Logs</h1>
        </div>  

        <div class="table-box">
       
            <table border="1">
                <thead>
                    <tr>
                        <th>Timestamp</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($logRow = $logResult->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($logRow['l_stamp']); ?></td>
                            <td><?php echo htmlspecialchars($logRow['l_description']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
$conn->close();
?>
</body>
</html>
