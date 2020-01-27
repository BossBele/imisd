<?php

class Connection
{
    public function connect()
    {
        $servername = "localhost";
        $username = "root";
        $conn_password = "";
        $dbname = "imi";

        /*create connection*/
        $conn = new mysqli($servername, $username, $conn_password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
}

