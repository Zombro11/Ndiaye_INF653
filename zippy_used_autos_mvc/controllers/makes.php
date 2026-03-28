<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/makes_db.php';

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_SPECIAL_CHARS)
    ?? filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS)
    ?? 'list_makes';

switch ($action) {
    case 'add_make':
        $make_name = trim(filter_input(INPUT_POST, 'make_name', FILTER_SANITIZE_SPECIAL_CHARS));
        if ($make_name !== '') {
            add_make($make_name);
        }
        header('Location: makes.php');
        exit();

    case 'delete_make':
        $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
        if ($make_id) {
            delete_make($make_id);
        }
        header('Location: makes.php');
        exit();

    default:
        $makes = get_makes();
        include __DIR__ . '/../view/makes_list.php';
}
