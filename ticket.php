<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $c_id = mysqli_real_escape_string($conn, $_POST['c_id']);
    $c_lname = mysqli_real_escape_string($conn, $_POST['c_lname']);
    $c_fname = mysqli_real_escape_string($conn, $_POST['c_fname']);
    $s_subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $s_message = mysqli_real_escape_string($conn, $_POST['message']);

    $query = "INSERT INTO tbl_supp_tickets (c_id, c_lname, c_fname, s_subject, s_message, s_status) 
              VALUES ('$c_id', '$c_lname', '$c_fname', '$s_subject', '$s_message', 1)";

    if (mysqli_query($conn, $query)) {
        echo "success";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
