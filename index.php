<?php
include "db.php"; 

// Initialize variables
$firstnameErr = $lastnameErr = "";
$firstname = $lastname = $email = $username = $type = $status = ""; 
$hasError = false; // Error tracking flag

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['firstname'])) {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);
    $type = $_POST['type'];
    $status = $_POST['status'];

    // Validate firstname and lastname (only letters and spaces allowed)
    if (!preg_match("/^[a-zA-Z\s-]+$/", $firstname)) {
        $firstnameErr = "Firstname must contain numbers.";
        $hasError = true;
    }

    if (!preg_match("/^[a-zA-Z\s-]+$/", $lastname)) {
        $lastnameErr = "Lastname must contain numbers.";
        $hasError = true;
    }

    // If no errors, insert into database
    if (!$hasError) {
        $sql = "INSERT INTO tbl_user (u_fname, u_lname, u_email, u_username, u_password, u_type, u_status)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("sssssss", $firstname, $lastname, $email, $username, $password, $type, $status);

        if ($stmt->execute()) {
            echo "<script>alert('Registration successful! Please log in.'); window.location.href='index.php';</script>";
            exit();
        } else {
            echo "Execution failed: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration & Login</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container <?php echo ($hasError) ? 'active' : ''; ?>">
        <!-- Login Form -->
        <div class="form-box login">
            <a href="settings.php" class="settings-link">
                <i class='bx bx-cog'></i>
                <span>Settings</span>
            </a>
            <form action="" method="POST">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" name="username" placeholder="Username" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="forgot-pass">
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" name="login" class="btn">Login</button>
                <p>or login with social platform</p>
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-google'></i></a>
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-github'></i></a>
                    <a href="#"><i class='bx bxl-linkedin'></i></a>
                </div>
            </form>
        </div>

        <!-- Registration Form -->
        <div class="form-box register">
            <form action="" method="POST">
                <h1>Registration</h1>
                <div class="input-box">
                    <input type="text" name="firstname" placeholder="Firstname" value="<?php echo htmlspecialchars($firstname); ?>" required>
                    <i class='bx bxs-user'></i>
                    <span class="error"><?php echo $firstnameErr; ?></span>
                </div>
                <div class="input-box">
                    <input type="text" name="lastname" placeholder="Lastname" value="<?php echo htmlspecialchars($lastname); ?>" required>
                    <i class='bx bxs-user'></i>
                    <span class="error"><?php echo $lastnameErr; ?></span>
                </div>
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="text" name="username" placeholder="Username" value="<?php echo htmlspecialchars($username); ?>" required>
                    <i class='bx bxs-user'></i>
                </div>            
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="input-box">
                    <select name="type" required>
                        <option value="" disabled selected>Select Type</option>
                        <option value="user" <?php if ($type == 'user') echo 'selected'; ?>>User</option>
                        <option value="admin" <?php if ($type == 'admin') echo 'selected'; ?>>Admin</option>
                        <option value="staff" <?php if ($type == 'staff') echo 'selected'; ?>>Staff</option>
                    </select>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <select name="status" required>
                        <option value="" disabled selected>Select Status</option>
                        <option value="pending" <?php if ($status == 'pending') echo 'selected'; ?>>Pending</option>
                        <option value="active" <?php if ($status == 'active') echo 'selected'; ?>>Active</option>
                    </select>
                    <i class='bx bxs-check-circle'></i>
                </div>
                <button type="submit" class="button">Register</button>
            </form>
        </div>

        <!-- Toggle Panels -->
        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Hello Welcome!</h1>
                <p>Don't have an account?</p>
                <button class="btn register-btn">Register</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Welcome Back!</h1>
                <p>Already have an account?</p>
                <button class="btn login-btn">Login</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const container = document.querySelector(".container");
            const registerBtn = document.querySelector(".register-btn");
            const loginBtn = document.querySelector(".login-btn");

            registerBtn.addEventListener("click", () => {
                container.classList.add("active");
            });

            loginBtn.addEventListener("click", () => {
                container.classList.remove("active");
            });
        });
    </script>

</body>
</html>
