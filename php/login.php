<?php
session_start();
include_once "config.php";
$email = $_POST['email'];
$password = $_POST['password'];
// Getting data with Ajax from javascript/login.js 

if (!empty($email) && !empty($password)) {
    $query1 = pg_query($conn, "SELECT * FROM users WHERE email ='{$email}' AND password='{$password}'");
    if (pg_num_rows($query1) > 0) {
        $row = pg_fetch_assoc($query1);
        $status = "Active now";

        $sql = pg_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
        if ($sql) {
            $_SESSION['unique_id'] = $row['unique_id'];
            echo "success";
        }
    } else {
        echo "email or Password is incorrect";
    }
} else {
    echo "All input are required";
}
