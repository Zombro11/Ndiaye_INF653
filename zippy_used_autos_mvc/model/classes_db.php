<?php
function get_classes(): array {
    global $db;
    $statement = $db->query("SELECT * FROM classes ORDER BY class_name");
    $classes = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $classes;
}

function add_class(string $class_name): void {
    global $db;
    $statement = $db->prepare("INSERT INTO classes (class_name) VALUES (:class_name)");
    $statement->execute([':class_name' => $class_name]);
    $statement->closeCursor();
}

function delete_class(int $class_id): void {
    global $db;
    $statement = $db->prepare("DELETE FROM classes WHERE class_id = :class_id");
    $statement->execute([':class_id' => $class_id]);
    $statement->closeCursor();
}
