<?php
include 'Course.php';
include 'Connection.php';

$course = new Course();


if ($_POST) {
    switch ($_POST) {
        /*add course*/
        case $_POST['add_course'] === "1":
            $code = $_POST['code'];
            $name = $_POST['name'];
            $duration = $_POST['duration'];
            $course->addCourse($code, $name, $duration);
            break;
        /*edit course*/
        case $_POST['edit_course'] === "1":
            $course_id = $_POST['course_id'];
            $code_edit = $_POST['code_edit'];
            $name_edit = $_POST['name_edit'];
            $duration_edit = $_POST['duration_edit'];
            $course->updateCourse($course_id, $code_edit, $name_edit, $duration_edit);
            break;
        /*delete course*/
        case $_POST['delete_course'] === "yes":
            $course->deleteCourse($_POST['course_id']);
            break;
        default:
            break;
    }

}

if ($_GET) {
    switch ($_GET) {
        /*retrieve all courses*/
        case $_GET['retrieve'] === "yes" && $_GET['edit'] === "1":
            $course->retrieveCourse();
            break;
        default:
            break;
    }
}