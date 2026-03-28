<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/vehicles_db.php';
require_once __DIR__ . '/../model/makes_db.php';
require_once __DIR__ . '/../model/types_db.php';
require_once __DIR__ . '/../model/classes_db.php';

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_SPECIAL_CHARS)
    ?? filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS)
    ?? 'list_vehicles';

switch ($action) {
    case 'delete_vehicle':
        $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
        if ($vehicle_id) {
            delete_vehicle($vehicle_id);
        }
        header('Location: index.php');
        exit();

    case 'show_add_form':
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        include __DIR__ . '/../view/vehicle_add.php';
        break;

    case 'add_vehicle':
        $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
        $model = trim(filter_input(INPUT_POST, 'model', FILTER_SANITIZE_SPECIAL_CHARS));
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
        $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
        $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);

        if ($year && $model !== '' && $price !== false && $type_id && $class_id && $make_id) {
            add_vehicle($year, $model, $price, $type_id, $class_id, $make_id);
        }
        header('Location: index.php');
        exit();

    default:
        $sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'price';
        $filter_type = filter_input(INPUT_GET, 'filter_type', FILTER_SANITIZE_SPECIAL_CHARS);
        $filter_id = filter_input(INPUT_GET, 'filter_id', FILTER_VALIDATE_INT);
        $vehicles = get_vehicles($sort, $filter_type, $filter_id);
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        include __DIR__ . '/../view/admin_vehicles_list.php';
}
