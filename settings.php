<?php 
session_start();
include '../database/db.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) { 
    header("Location: index.php"); // Redirect to login page if not logged in 
    exit(); 
}

if ($conn) {
    // Fetch user data based on the logged-in username
    $sqlUser  = "SELECT u_password FROM tbl_user WHERE u_username = ?";
    $stmt = $conn->prepare($sqlUser );
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();
    $resultUser  = $stmt->get_result();

    if ($resultUser ->num_rows > 0) {
        $row = $resultUser ->fetch_assoc();
        $currentPasswordHash = $row['u_password']; // Assuming passwords are hashed
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if (password_verify($oldPassword, $currentPasswordHash)) {
        if ($newPassword === $confirmPassword) {
            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
            $sqlUpdate = "UPDATE tbl_user SET u_password = ? WHERE u_username = ?";
            $stmtUpdate = $conn->prepare($sqlUpdate);
            $stmtUpdate->bind_param("ss", $newPasswordHash, $_SESSION['username']);
            if ($stmtUpdate->execute()) {
                echo "<script>alert('Password changed successfully!');</script>";
                header("Location: index.php"); // Redirect to index.php after successful password change
                exit();
            } else {
                echo "<script>alert('Error updating password.');</script>";
            }
        } else {
            echo "<script>alert('New password and confirm password do not match.');</script>";
        }
    } else {
        echo "<script>alert('Old password is incorrect.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/setting.css">
    <script>
        // Toggle password visibility
        function togglePasswordVisibility(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            icon.classList.toggle('bx-show');
            icon.classList.toggle('bx-hide');
        }
    </script>
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
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <p>Manage your account settings and security preferences here.</p>
        </div>

        <div class="right-side">
            <form action="" method="POST">
                <h1>Account Settings</h1>

                <div class="input-box">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" id="old_password" name="old_password" placeholder="Old Password" required>
                    <i class='bx bx-show' id="toggleOldPassword" onclick="togglePasswordVisibility('old_password', 'toggleOldPassword')"></i>
                </div>
                <div class="input-box">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" id="new_password" name="new_password" placeholder="New Password" required>
                    <i class='bx bx-show' id="toggleNewPassword" onclick="togglePasswordVisibility('new_password', 'toggleNewPassword')"></i>
                </div>
                <div class="input-box">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                    <i class='bx bx-show' id="toggleConfirmPassword" onclick="togglePasswordVisibility('confirm_password', 'toggleConfirmPassword')"></i>
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