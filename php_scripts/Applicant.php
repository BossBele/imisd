<?php


class Applicant
{

    public function addApplicant($name, $phone, $email, $course_id)
    {
        $connection = new Connection();
        $sql = "insert into applicant (name, phone,email,course_id) values ('" . $name . "', '" . $phone . "','" . $email . "','" . $course_id . "')";
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

}