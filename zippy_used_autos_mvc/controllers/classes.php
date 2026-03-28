<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/classes_db.php';

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_SPECIAL_CHARS)
    ?? filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS)
    ?? 'list_classes';

switch ($action) {
    case 'add_class':
        $class_name = trim(filter_input(INPUT_POST, 'class_name', FILTER_SANITIZE_SPECIAL_CHARS));
        if ($class_name !== '') {
            add_class($class_name);
        }
        header('Location: classes.php');
        exit();

    case 'delete_class':
        $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
        if ($class_id) {
            delete_class($class_id);
        }
        header('Location: classes.php');
        exit();

    default:
        $classes = get_classes();
        include __DIR__ . '/../view/classes_list.php';
}
