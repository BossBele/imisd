<?php
include 'Course.php';
include 'Connection.php';

$course = new Course();


if ($_POST) {
    switch ($_POST) {
        /*add course*/
        case isset($_POST['add_course']):
            $code = $_POST['code'];
            $name = $_POST['name'];
            $duration = $_POST['duration'];
            $programme_id = $_POST['programme_id'];
            $course->addCourse($code, $name, $duration, $programme_id);
            break;
        /*edit course*/
        case isset($_POST['edit_course']):
            $course_id = $_POST['course_id'];
            $code_edit = $_POST['code_edit'];
            $name_edit = $_POST['name_edit'];
            $duration_edit = $_POST['duration_edit'];
            $course->updateCourse($course_id, $code_edit, $name_edit, $duration_edit);
            break;
        /*delete course*/
        case isset($_POST['delete_course']):
            $course->deleteCourse($_POST['course_id']);
            break;
        default:
            break;
    }

}

if ($_GET) {
    switch ($_GET) {
        /*retrieve all courses*/
        case isset($_GET['retrieve']):
            $course->retrieveCourse();
            break;
        case isset($_GET['retrieve_programme']):
            $course->retrieveProgramme();
            break;
        default:
            break;
    }
}