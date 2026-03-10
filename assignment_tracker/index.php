<?php
require('model/database.php');
require('model/assignment_db.php');
require('model/course_db.php');

$assignment_id = filter_input(INPUT_POST, 'assignment_id', FILTER_VALIDATE_INT);
$description = filter_input(INPUT_POST, 'description', FILTER_UNSAFE_RAW);
$course_name = filter_input(INPUT_POST, 'course_name', FILTER_UNSAFE_RAW);

$course_id = filter_input(INPUT_POST, 'course_id', FILTER_VALIDATE_INT);
if (!$course_id) {
    $course_id = filter_input(INPUT_GET, 'course_id', FILTER_VALIDATE_INT);
}

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
}
if (!$action) {
    $action = 'list_assignments';
}

switch ($action) {
    case 'list_courses':
        $courses = get_courses();
        include('view/course_list.php');
        break;

    case 'add_course':
        if ($course_name) {
            add_course($course_name);
        }
        header('Location: .?action=list_courses');
        exit();

    case 'add_assignment':
        if ($course_id && $description) {
            add_assignment($course_id, $description);
        }
        header('Location: .?action=list_assignments');
        exit();

    case 'delete_course':
        if ($course_id) {
            delete_course($course_id);
        }
        header('Location: .?action=list_courses');
        exit();

    case 'delete_assignment':
        if ($assignment_id) {
            delete_assignment($assignment_id);
        }
        header('Location: .?action=list_assignments');
        exit();

    case 'edit_assignment':
        if ($assignment_id) {
            $assignment = get_assignment($assignment_id);
            $courses = get_courses();
            include('view/update_assignment.php');
        }
        break;

    case 'update_assignment':
        if ($assignment_id && $description && $course_id) {
            update_assignment($assignment_id, $description, $course_id);
        }
        header('Location: .?action=list_assignments');
        exit();

    case 'edit_course':
        if ($course_id) {
            $course = get_course($course_id);
            include('view/update_course.php');
        }
        break;

    case 'update_course':
        if ($course_id && $course_name) {
            update_course($course_id, $course_name);
        }
        header('Location: .?action=list_courses');
        exit();

    case 'list_assignments':
    default:
        $courses = get_courses();
        $assignments = get_assignments_by_course($course_id);
        include('view/assignment_list.php');
        break;
}