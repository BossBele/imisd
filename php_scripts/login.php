<?php
include 'Connection.php';


$connection = new Connection();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $passwords = $_POST['password'];

    if (isset($passwords)) {

        $sql = "SELECT * FROM user WHERE name='" . $username . "'";
        $result = mysqli_query($connection->connect(), $sql);

        if ($result->num_rows === 1) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if ($row['password'] == $passwords) {
                /*login accepted*/
                header("Location: ../manage/html/index.html");
                exit;
            } else {
                /*not found*/
            }
        }

    }

}