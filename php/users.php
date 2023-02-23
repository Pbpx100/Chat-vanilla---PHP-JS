<?php
session_start();
include_once "config.php";
//Showing the user to chat
//In casse list of User is == 1 -> there is not users to chat cause you are the only one User
$outgoing_id = $_SESSION['unique_id'];
$query = pg_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}");
$output = "";
if (pg_num_rows($query) == 1) {
    $output .= "No users available to chat";
} elseif (pg_num_rows($query) > 0) {
    include "data.php";
}
echo $output;
