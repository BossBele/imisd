<?php
include 'Course.php';
include 'Programme.php';
include 'Applicant.php';
include 'Connection.php';

$course = new Course();
$programme = new Programme();
$applicant = new Applicant();

if ($_POST) {

    switch ($_POST) {
        /*add course*/
        case isset($_POST['add_course']):
            $code = $_POST['code'];
            $name = $_POST['name'];
            $duration = $_POST['duration'];
            $programme_id = $_POST['programme_id'];
            $date = $_POST['date'];
            $course->addCourse($code, $name, $duration, $programme_id, $date);
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
        case isset($_POST['apply']):
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $course_id = $_POST['course_id'];
            $applicant->addApplicant($name, $phone, $email, $course_id);
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
        case isset($_GET['retrieve_course_by_programme']):
            $programme_id = $_GET['programme'];
            $programme->retrieveCourseByProgramme($programme_id);
            break;
        case isset($_GET['retrieve_all_course_by_programme']):
            $programme->retrieveAllCourseByProgramme();
            break;
        default:
            break;
    }
}