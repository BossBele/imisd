<?php


class Programme
{
    public function retrieveCourseByProgramme($programme_id)
    {
        $connection = new Connection();
        $sql = "select * from course where programme_id = '" . $programme_id . "'";
        $result = mysqli_query($connection->connect(), $sql);

        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($data, array(
                    'id' => $row['id'],
                    'code' => $row['code'],
                    'name' => $row['name'],
                    'duration' => $row['duration'],
                    'dates' => $row['date']
                ));
            }
        }

        echo json_encode($data);
    }

    public function retrieveAllCourseByProgramme()
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
                    'programme_id' => $row['programme_id'],
                    'duration' => $row['duration'],
                    'dates' => $row['date']
                ));
            }
        }

        foreach ($data as $val) {
            if (array_key_exists('programme_id', $val)) {
                $grouped_sales[$val['programme_id']][] = $val;
            }
        }

//        print("<pre>".print_r($grouped_sales,true)."</pre>");

        echo json_encode($grouped_sales);
    }


}