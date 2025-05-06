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
    $stmt = $conn->prepare("DELETE FROM menu WHERE id = ?");
    $stmt->execute([
        $id
    ]);
    header("location: ../admin");
}
