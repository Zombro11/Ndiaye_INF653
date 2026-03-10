<?php

$dsn = 'mysql:host=localhost;dbname=assignment_tracker';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}