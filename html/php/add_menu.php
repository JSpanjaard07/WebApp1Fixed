<?php

require_once "db.php";

session_start();
$is_logged_in = $_SESSION["logged_in"] ?? false;

if (!$is_logged_in) {
    die("kys");
}

$db = new db();
$conn = $db->get_connection();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];

    $sql = "INSERT INTO menu (name, price, description) VALUES (:name, :price, :description)";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ":name" => $name,
        ":price" => $price,
        ":description" => $description
    ]);


}