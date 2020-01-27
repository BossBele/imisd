<?php

include 'connection.php';

/*save course data*/
if ($_POST) {

    if ($_POST['add_course'] === "1") {
        $code = $_POST['code'];
        $name = $_POST['name'];
        $duration = $_POST['duration'];
//    $date = $_POST['date'];

        $sql = "insert into course (code, name, duration) values ('" . $code . "', '" . $name . "','" . $duration . "')";
        $result = mysqli_query($conn, $sql);

        $response = array();
        if ($result) {
            array_push($response, array(
                'message' => "success"
            ));
        } else {
            array_push($response, array(
                'message' => "failed"
            ));
        }

        echo json_encode($response);
    }else{
        print_r($_POST);
    }

}

/*retrieve courses*/
if ($_GET) {
    if ($_GET['yes'] === '') {
        $sql = "select * from course";
        $result = mysqli_query($conn, $sql);

        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($data, array(
                    'id' => $row['id'],
                    'code' => $row['code'],
                    'name' => $row['name'],
                    'duration' => $row['duration']
                ));
            }
        }

        echo json_encode($data);
    }
    $conn->close();
}

