<?php 
include 'db.php';
session_start(); 

// Check if the user is logged in
if (!isset($_SESSION['username'])) { 
    header("Location: index.php"); // Redirect to login page if not logged in 
    exit(); 
}

// Initialize variables
$firstName = '';
$userType = '';
$totalUsers = 0;
$totalActive = 0;
$totalPending = 0;
$totalCustomers = 0;

// Check database connection
if ($conn) {
    // Fetch user data based on the logged-in username
    $sqlUser          = "SELECT u_fname, u_type FROM tbl_user WHERE u_username = ?";
    $stmt = $conn->prepare($sqlUser   );
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();
    $resultUser        = $stmt->get_result();

    if ($resultUser   ->num_rows > 0) {
        $row = $resultUser   ->fetch_assoc();
        $firstName = $row['u_fname'];
        $userType = $row['u_type'];
    }

    // Fetch all users data
    $sql = "SELECT u_id, u_fname, u_lname, u_email, u_username, u_type, u_status FROM tbl_user"; 
    $result = $conn->query($sql); 

    if ($result) {
        $totalUsers = $result->num_rows; // Total registered users
        while ($row = $result->fetch_assoc()) {
            if ($row['u_status'] === 'active') {
                $totalActive++;
            } elseif ($row['u_status'] === 'pending') {
                $totalPending++;
            }
        }
    }

    // Fetch total customers count
    $sqlCustomers = "SELECT COUNT(*) as total FROM tbl_customer"; 
    $resultCustomers = $conn->query($sqlCustomers);

    if ($resultCustomers) {
        $rowCustomers = $resultCustomers->fetch_assoc();
        $totalCustomers = $rowCustomers['total']; // Total customers
    }
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
    <link rel="stylesheet" href="adminD.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
  
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
            <h1>Dashboard</h1>
            <div class="search-container">
                <input type="text" class="search-bar" placeholder="Search...">
                <span class="search-icon">🔍</span>
                <a href="settings.php" class="settings-link">
                    <i class='bx bx-cog'></i>
                    <span>Settings</span>
                </a>
            </div>
        </div>

        <div class="table-box">
            <?php if ($userType === 'admin'): ?>
                <div class="username">
                    Welcome Back, <?php echo htmlspecialchars($firstName); ?>!
                    <i class="fas fa-user-shield admin-icon"></i>
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
                <div class="stat">
                    <h3>Total Customers</h3> 
                    <p><?php echo $totalCustomers; ?></p>
                </div>
            </div>

            <!-- Chart Section -->
            <h2>User Statistics</h2>
            <div class="charts">
                <div>
                  
                    <canvas id="registeredUsersChart"></canvas>
                </div>
                <div>
                   
                    <canvas id="activeUsersChart"></canvas>
                </div>
                <div>
                  
                    <canvas id="pendingUsersChart"></canvas>
                </div>
                <div>
                   
                    <canvas id="customersChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  function createDoughnutChart(ctx, label, dataValue, total, colors) {
    const percentage = ((dataValue / total) * 100).toFixed(2);

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [label, 'Remaining'],
            datasets: [{
                data: [dataValue, total - dataValue],
                backgroundColor: colors,
                borderColor: ['rgba(0, 0, 0, 0.1)', 'rgba(0, 0, 0, 0.1)'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            cutout: '70%',
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return `${tooltipItem.label}: ${tooltipItem.raw.toFixed(2)}%`;
                        }
                    }
                }
            }
        },
        plugins: [{
            beforeDraw: function(chart) {
                const width = chart.width,
                      height = chart.height,
                      ctx = chart.ctx;

                ctx.restore();
                const fontSize = (height / 6).toFixed(2);
                ctx.font = fontSize + "px Arial";
                ctx.textBaseline = "middle";
                ctx.textAlign = "center";

                const text = percentage + "%";
                const textX = Math.round(width / 2);
                const textY = Math.round(height / 2);

                ctx.fillText(text, textX, textY);
                ctx.save();
            }
        }]
    });
}

const total = <?php echo $totalUsers + $totalActive + $totalPending + $totalCustomers; ?>;

// Create each doughnut chart with unique colors and names
const registeredUsersCtx = document.getElementById('registeredUsersChart').getContext('2d');
createDoughnutChart(registeredUsersCtx, 'Total Warriors', <?php echo $totalUsers; ?>, total, 
    ['rgba(255, 99, 132, 0.6)', 'rgba(0, 0, 0, 0.1)']); // Red

const activeUsersCtx = document.getElementById('activeUsersChart').getContext('2d');
createDoughnutChart(activeUsersCtx, 'Active Champions', <?php echo $totalActive; ?>, total, 
    ['rgba(54, 162, 235, 0.6)', 'rgba(0, 0, 0, 0.1)']); // Blue

const pendingUsersCtx = document.getElementById('pendingUsersChart').getContext('2d');
createDoughnutChart(pendingUsersCtx, 'Awaiting Heroes', <?php echo $totalPending; ?>, total, 
    ['rgba(255, 206, 86, 0.6)', 'rgba(0, 0, 0, 0.1)']); // Yellow

const customersCtx = document.getElementById('customersChart').getContext('2d');
createDoughnutChart(customersCtx, 'Loyal Supporters', <?php echo $totalCustomers; ?>, total, 
    ['rgba(75, 192, 192, 0.6)', 'rgba(0, 0, 0, 0.1)']); // Green

</script>
</body>
</html>

<?php 
$conn->close(); // Close the database connection 
?>