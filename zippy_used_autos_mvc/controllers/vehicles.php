<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/vehicles_db.php';
require_once __DIR__ . '/../model/makes_db.php';
require_once __DIR__ . '/../model/types_db.php';
require_once __DIR__ . '/../model/classes_db.php';

$sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'price';
$filter_type = filter_input(INPUT_GET, 'filter_type', FILTER_SANITIZE_SPECIAL_CHARS);
$filter_id = filter_input(INPUT_GET, 'filter_id', FILTER_VALIDATE_INT);

$makes = get_makes();
$types = get_types();
$classes = get_classes();
$vehicles = get_vehicles($sort, $filter_type, $filter_id);

include __DIR__ . '/../view/vehicles_list.php';
