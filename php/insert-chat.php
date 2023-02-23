<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    //Getting information message from chat.js 
    //Inserting messages id and messages in database
    $outgoing_id = $_POST['outgoing_id'];
    $incoming_id = $_POST['incoming_id'];
    $message = $_POST['message'];

    if (!empty($message)) {
        $query = pg_query($conn, "INSERT INTO messages(incoming_msg_id, outgoing_msg_id, msg) 
        VALUES('{$outgoing_id}', '{$incoming_id}', '{$message}') ") or die();
    }
} else {
    header("../login.php");
}
