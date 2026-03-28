<?php
function get_types(): array {
    global $db;
    $statement = $db->query("SELECT * FROM types ORDER BY type_name");
    $types = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $types;
}

function add_type(string $type_name): void {
    global $db;
    $statement = $db->prepare("INSERT INTO types (type_name) VALUES (:type_name)");
    $statement->execute([':type_name' => $type_name]);
    $statement->closeCursor();
}

function delete_type(int $type_id): void {
    global $db;
    $statement = $db->prepare("DELETE FROM types WHERE type_id = :type_id");
    $statement->execute([':type_id' => $type_id]);
    $statement->closeCursor();
}
