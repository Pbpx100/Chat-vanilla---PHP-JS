<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['unique_id'];
$searchTerm = $_POST['searchTerm'];
$output = '';

// Searching term in database by name and last name with Ajax
$query = pg_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND 
(fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%')");
if ($row = pg_num_rows($query) > 0) {
    //data.php Show the data of the message in the first page in users.php page
    include "data.php";
} else {
    $output .= "Not users with this name";
}
echo $output;
