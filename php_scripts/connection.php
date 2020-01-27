<?php

$servername = "localhost";
$username = "root";
$conn_password = "";
$dbname = "imi";

/*create connection*/
$conn = new mysqli($servername, $username, $conn_password,$dbname);

//$hashed_password = password_hash("12345678", PASSWORD_DEFAULT);
//var_dump($hashed_password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*close connection*/
//$conn->close();
