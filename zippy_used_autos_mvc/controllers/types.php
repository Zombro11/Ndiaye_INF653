<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/types_db.php';

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_SPECIAL_CHARS)
    ?? filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS)
    ?? 'list_types';

switch ($action) {
    case 'add_type':
        $type_name = trim(filter_input(INPUT_POST, 'type_name', FILTER_SANITIZE_SPECIAL_CHARS));
        if ($type_name !== '') {
            add_type($type_name);
        }
        header('Location: types.php');
        exit();

    case 'delete_type':
        $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
        if ($type_id) {
            delete_type($type_id);
        }
        header('Location: types.php');
        exit();

    default:
        $types = get_types();
        include __DIR__ . '/../view/types_list.php';
}
