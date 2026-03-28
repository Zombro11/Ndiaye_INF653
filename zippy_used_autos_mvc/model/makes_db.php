<?php
function get_makes(): array {
    global $db;
    $statement = $db->query("SELECT * FROM makes ORDER BY make_name");
    $makes = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $makes;
}

function add_make(string $make_name): void {
    global $db;
    $statement = $db->prepare("INSERT INTO makes (make_name) VALUES (:make_name)");
    $statement->execute([':make_name' => $make_name]);
    $statement->closeCursor();
}

function delete_make(int $make_id): void {
    global $db;
    $statement = $db->prepare("DELETE FROM makes WHERE make_id = :make_id");
    $statement->execute([':make_id' => $make_id]);
    $statement->closeCursor();
}
