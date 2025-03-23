<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $c_id = mysqli_real_escape_string($conn, $_POST['c_id']); // Use customer ID instead
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $query = "UPDATE tbl_supp_tickets SET s_status = '$status' WHERE c_id = '$c_id'";  
    if (mysqli_query($conn, $query)) {
        echo "Status updated successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
