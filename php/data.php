<?php
// We send receive datas witj Ajax chat.js

while ($row = pg_fetch_assoc($query)) {
    $query2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id}
OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
    $sql2 = pg_query($conn, $query2);
    $row2 = pg_fetch_assoc($sql2);
    if (pg_num_rows($sql2) > 0) {
        $result = $row2['msg'];
    } else {
        $result = "No message available";
    }

    // trimming message if word are more tha 28. to put in the chat before to begin to talk
    (strlen($result) > 28) ? $msg = substr($result, 0, 28) . '...' : $msg = $result;
    // adding you : text before msg if login id send msg

    $you = "You:  ";
    //Checking if user active
    ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
    //Creating space to chat with unique id
    $output .= '<a href="chat.php?user_id=' . $row['unique_id'] . '">
    <div class="content">
        <img src="php/images/' . $row['image'] . '" alt="">
        <div class="details">
            <span>' . $row['fname'] . " " . $row['lname'] . '</span>
            <p>' . $you . $msg . '</p>
        </div>
    </div>
    <div class="status-dotm ' . $offline . '"><i class="fas fa-circle"></i></div>
</a> ';
}
