<?php 
session_start();
include 'db.php'; 

// Check if the user is logged in
if (!isset($_SESSION['username'])) { 
    header("Location: index.php"); // Redirect to login page if not logged in 
    exit(); 
}

// Check if the customer ID is provided
if (isset($_GET['id'])) {
    $customerId = $_GET['id'];

    // Fetch customer details based on the customer ID
    $sql = "SELECT c_id, c_fname, c_lname, c_area, c_contact, c_email, c_onu, c_caller, c_address, c_rem FROM tbl_customer WHERE c_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $customerId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $customer = $result->fetch_assoc();
    } else {
        echo "Customer not found.";
        exit();
    }
} else {
    echo "No customer ID provided.";
    exit();
}

// Handle form submission for updating the customer
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $area = $_POST['area'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $onu = $_POST['ONU'];
    $caller = $_POST['caller'];
    $macAddress = $_POST['address'];
    $remarks = $_POST['remarks'];

    // Update the customer in the database
    $sqlUpdate = "UPDATE tbl_customer SET c_fname = ?, c_lname = ?, c_area = ?, c_contact = ?, c_email = ?, c_date = ?, c_onu = ?, c_caller = ?, c_address = ?, c_rem = ? WHERE c_id = ?";
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bind_param("ssssssssssi", $firstName, $lastName, $area, $contact, $email, $date, $onu, $caller, $macAddress, $remarks, $customerId);
    
    if ($stmtUpdate->execute()) {
        echo "<script>alert('Customer updated successfully!'); window.location.href='customersT.php';</script>";
    } else {
        echo "<script>alert('Error updating customer.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <link rel="stylesheet" href="editC.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <a href="customersT.php" class="back-icon">
                <i class='bx bx-arrow-back'></i>
            </a>
            <h1>Edit Customer</h1>
            <form method="POST" action="" class="form">
                <div class="form-row">
                    <label for="firstname">First Name:</label>
                    <input type="text" id="firstname" name="firstname" value="<?php echo htmlspecialchars($customer['c_fname']); ?>" required>
                </div>
                <div class="form-row">
                    <label for="lastname">Last Name:</label>
                    <input type="text" id="lastname" name="lastname" value="<?php echo htmlspecialchars($customer['c_lname']); ?>" required>
                </div>
                <div class="form-row">
                    <label for="area">Area:</label>
                    <input type="text" id="area" name="area" value="<?php echo htmlspecialchars($customer['c_area']); ?>" required>
                </div>
                <div class="form-row">
                    <label for="contact">Contact:</label>
                    <input type="text" id="contact" name="contact" value="<?php echo htmlspecialchars($customer['c_contact']); ?>" required>
                </div>
                <div class="form-row">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($customer['c_email']); ?>" required>
                </div>
                <div class="form-row">
    <label for="date">Date:</label>
    <input type="date" id="date" name="date" 
           value="<?php echo (!empty($customer['c_date']) && strtotime($customer['c_date'])) ? date('Y-m-d', strtotime($customer['c_date'])) : ''; ?>" 
           required>
</div>

                <h2>Advanced Profile</h2>
                <hr class="title-line">
                <div class="form-row">
                    <label for="ONU">ONU Name:</label>
                    <input type="text" id="ONU" name="ONU" value="<?php echo htmlspecialchars($customer['c_onu']); ?>" required>
                </div>
                <div class="form-row">
                    <label for="caller">Caller ID:</label>
                    <input type="text" id="caller" name="caller" value="<?php echo htmlspecialchars($customer['c_caller']); ?>" required>
                </div>
                <div class="form-row">
                    <label for="address">Mac Address:</label>
                    <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($customer['c_address']); ?>" required>
                </div>
                <div class="form-row">
                    <label for="remarks">Remarks:</label>
                    <input type="text" id="remarks" name="remarks" value="<?php echo htmlspecialchars($customer['c_rem']); ?>" required>
                </div>
                <div class="button-container">
                    <button type="submit">Update Customer</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>