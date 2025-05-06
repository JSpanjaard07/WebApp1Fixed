<?php
session_start();

$is_logged_in = $_SESSION["logged_in"] ?? false;

if (!$is_logged_in) {
    die("kys");
}

require_once 'db.php';

$db = new db();
$conn = $db->get_connection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];

    $sql = "UPDATE menu SET name = ?, description = ?, price = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    $stmt->execute([
        $name, $description, $price, $id
    ]);
    header("location: ../admin");
}
