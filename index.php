<?php
include "db.php"; 


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['firstname'])) {
   
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT); // Secure password
    $type = $_POST['type'];
    $status = $_POST['status'];

   
    $sql = "INSERT INTO tbl_user(u_fname, u_lname, u_email, u_username, u_password, u_type, u_status)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);

    if (!$stmt) { 
        die("Prepare failed: " . $conn->error);
    } 

    $stmt->bind_param("sssssss", $firstname, $lastname, $email, $username, $password, $type, $status);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!'); window.location.href='index.php';</script>";
    } else {
        echo "Execution failed: " . $stmt->error;
    }

    $stmt->close();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Update the SQL query to fetch user ID
    $sql = "SELECT u_id, u_password, u_type FROM tbl_user WHERE u_username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password, $user_type);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            session_start();
            $_SESSION['username'] = $username; 
            $_SESSION['user_id'] = $user_id; 

            if ($user_type === 'admin') {
                header("Location: adminD.php");
            } elseif ($user_type === 'staff') {
                header("Location: staff.php"); 
            } else {
                header("Location: userD.php"); 
            }
            exit();
        } else {
            echo "<script>alert('Invalid username or password.');</script>";
        }
    } else {
        echo "<script>alert('Invalid username or password.');</script>";
    }

    $stmt->close();
}

$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>


    <div class="container">
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

        <div class="form-box register">
    <form action="index.php" method="POST">

        <div class="input-box">
            <input type="text" name="firstname" placeholder="Firstname" required>
            <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
            <input type="text" name="lastname" placeholder="Lastname" required>
            <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
            <input type="email" name="email" placeholder="Email" required>
            <i class='bx bxs-envelope'></i>
        </div>
        <div class="input-box">
            <input type="text" name="username" placeholder="Username" required>
            <i class='bx bxs-user'></i>
        </div>            
        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
            <i class='bx bxs-lock-alt'></i>
        </div>
        <div class="input-box">
            <select name="type" required>
                <option value="" disabled selected>Select Type</option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
            </select>
            <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
            <select name="status" required>
                <option value="" disabled selected>Select Status</option>
                <option value="pending">Pending</option>
                <option value="active">Active</option>
            </select>
            <i class='bx bxs-check-circle'></i>
        </div>
        
               
                <button type="submit" class="button">Register</button>
                
            </form>
        </div>
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
