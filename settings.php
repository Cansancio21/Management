<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="setting.css">
</head>
<body>
    <div class="container">
      
        <div class="left-side" style="position: relative;">
          
            <a href="index.php" class="back-arrow">
                <i class='bx bx-arrow-back'></i>
            </a>

            <div class="user-icon">
                <i class='bx bxs-user-circle'></i>
            </div>
            <h2>Welcome, User!</h2>
            <p>Manage your account settings and security preferences here.</p>
        </div>

        
        <div class="right-side">
            <form action="">
                <h1>Account Settings</h1>

                <div class="input-box">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" placeholder="Old Password" required>
                </div>
                <div class="input-box">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" placeholder="New Password" required>
                </div>
                <div class="input-box">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" placeholder="Confirm Password" required>
                </div>

                <button type="submit" class="btn">Save Changes</button>

                <div class="settings-icons">
                    <a href="#"><i class='bx bxs-user'></i> Account</a>
                    <a href="#"><i class='bx bxs-lock'></i> Security</a>
                    <a href="#"><i class='bx bxs-bell'></i> Notifications</a>
                    <a href="#"><i class='bx bxs-cog'></i> Preferences</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
