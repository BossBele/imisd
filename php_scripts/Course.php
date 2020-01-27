<?php

class Course
{
    public function addCourse($code, $name, $duration)
    {
        $connection = new Connection();
        $sql = "insert into course (code, name, duration) values ('" . $code . "', '" . $name . "','" . $duration . "')";
        $result = mysqli_query($connection->connect(), $sql);
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
    }

    public function updateCourse($course_id, $code_edit, $name_edit, $duration_edit)
    {
        $connection = new Connection();

        $sql = "update course set code = '" . $code_edit . "', name = '" . $name_edit . "', duration ='" . $duration_edit . "' where id ='" . $course_id . "'";
        $result = mysqli_query($connection->connect(), $sql);

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
    }

    public function deleteCourse($course_id)
    {
        $connection = new Connection();
        $sql = "delete from course where id='" . $course_id . "'";
        $result = mysqli_query($connection->connect(), $sql);
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
    }

    public function retrieveCourse()
    {
        $connection = new Connection();
        $sql = "select * from course";
        $result = mysqli_query($connection->connect(), $sql);

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

}


