<?php
//Initialize connexion
$conn = pg_connect("host=localhost dbname=chat user=<yourusername> password=<yourpassword>");
if ($conn) {
} else {
    echo "Error de conection" . pg_connection_status($conn);
}
