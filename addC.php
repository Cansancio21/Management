<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="addC.css"> 
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
        <li><a href="view_incident_report.php"><i class="fas fa-user-plus"></i> Add Customer</a></li>
            
        </ul>
        <footer>
        <a href="index.php" class="back-home"><i class="fas fa-home"></i> Back to Home</a>
        </footer>
    </div>

    <div class="container">
       
        <div class="upper">
        <h1>Add Customer</h1>
        </div>  
        
     <div class="table-box">
     <h2>Customer Profile</h2>
     <hr class="title-line"> <!-- Add this line -->

     <form action="" method="POST">
            <div class="row">
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="firstname">First Name:</label>
                    <input type="text" name="firstname" placeholder="Enter Firstname" required>
                </div>
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="lastname">Last Name:</label>
                    <input type="text" name="lastname" placeholder="Enter Lastname" required>
                </div>
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="area">Area:</label>
                    <input type="text" name="area" placeholder="Enter Area" required>
                </div>
            </div>

            <div class="row">
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="contact">Contact:</label>
                    <input type="text" name="contact" placeholder="Enter Contact" required>
                </div>
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="email">Email:</label>
                    <input type="" name="email" placeholder="Enter Email" required>
                </div>
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="date">Date:</label>
                    <input type="date" name="date" placeholder="Enter Subscription Date" required>
                </div>
            </div>

            <h2>Advance Profile</h2>
            <hr class="title-line"> <!-- Add this line -->

            <div class="secondrow">
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="contact"> OLT Device:</label>
                    <select name="contact" required>
                        <option value="" disabled selected>Select Type</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="email">Pon Port:</label>
                    <select name="contact" required>
                        <option value="" disabled selected>Select Type</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="date">Nap Device:</label>
                    <select name="contact" required>
                        <option value="" disabled selected>Select Type</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="date">Nap Port:</label>
                    <select name="contact" required>
                        <option value="" disabled selected>Select Type</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>
            </div>

            <div class="secondrow">
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="contact"> ONU Name:</label>
                    <input type="text" name="contact" placeholder="Select OLT Device" required>
                </div>
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="email">Caller ID:</label>
                    <input type="text" name="email" placeholder="Select PON port" required>
                </div>
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="date">Mac Adress:</label>
                    <input type="text" name="date" placeholder="Select NAP Device" required>
                </div>
                <div class="input-box">
                    <i class="bx bxs-user"></i>
                    <label for="date">Remarks:</label>
                    <input type="date" name="date" placeholder="Select NAP Port" required>
                </div>
            </div>

            </form>

     </div>
    </div>
</div>
</body>
</html>

