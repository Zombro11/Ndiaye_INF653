<?php
function get_vehicles(string $sort = 'price', ?string $filter_type = null, ?int $filter_id = null): array {
    global $db;

    $allowed_sort = ['price', 'year'];
    if (!in_array($sort, $allowed_sort, true)) {
        $sort = 'price';
    }

    $order_by = $sort === 'year' ? 'v.year DESC, v.price DESC' : 'v.price DESC, v.year DESC';

    $sql = "SELECT v.vehicle_id, v.year, v.model, v.price,
                   m.make_name, t.type_name, c.class_name,
                   v.make_id, v.type_id, v.class_id
            FROM vehicles v
            JOIN makes m ON v.make_id = m.make_id
            JOIN types t ON v.type_id = t.type_id
            JOIN classes c ON v.class_id = c.class_id";

    $params = [];
    if ($filter_type && $filter_id) {
        switch ($filter_type) {
            case 'make':
                $sql .= " WHERE v.make_id = :filter_id";
                $params[':filter_id'] = $filter_id;
                break;
            case 'type':
                $sql .= " WHERE v.type_id = :filter_id";
                $params[':filter_id'] = $filter_id;
                break;
            case 'class':
                $sql .= " WHERE v.class_id = :filter_id";
                $params[':filter_id'] = $filter_id;
                break;
        }
    }

    $sql .= " ORDER BY $order_by";
    $statement = $db->prepare($sql);
    $statement->execute($params);
    $vehicles = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $vehicles;
}

function add_vehicle(int $year, string $model, float $price, int $type_id, int $class_id, int $make_id): void {
    global $db;
    $sql = "INSERT INTO vehicles (year, model, price, type_id, class_id, make_id)
            VALUES (:year, :model, :price, :type_id, :class_id, :make_id)";
    $statement = $db->prepare($sql);
    $statement->execute([
        ':year' => $year,
        ':model' => $model,
        ':price' => $price,
        ':type_id' => $type_id,
        ':class_id' => $class_id,
        ':make_id' => $make_id
    ]);
    $statement->closeCursor();
}

function delete_vehicle(int $vehicle_id): void {
    global $db;
    $sql = "DELETE FROM vehicles WHERE vehicle_id = :vehicle_id";
    $statement = $db->prepare($sql);
    $statement->execute([':vehicle_id' => $vehicle_id]);
    $statement->closeCursor();
}
