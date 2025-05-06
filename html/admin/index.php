<?php
session_start();

set_error_handler(function (){});
$is_logged_in = $_SESSION["logged_in"];
restore_error_handler();

if (!$is_logged_in) {
    die("Get out of my swamp!");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Admin Panel:
    <br>
    <br>
    <br>
    <!-- for adding products: -->
    <form action="/php/add_menu.php" method="POST">
        <label for="name">Name</label>
        <input required type="text" name="name">
        <label for="price">Price</label>
        <input required type="number" step="0.01" name="price">
        <label for="description">Description</label>
        <input required type="text" name="description">
        <input type="submit" value="submit">
    </form>
    <!-- for modifying products: -->
    <form method="POST" action="/php/modify.php" class="form center column">
            <h1 class="form-text center">Modify Product:</h1>
            <label class="form-text">Product ID:</label>
            <input type="number" name="id" class="form-box" required>

            <label class="form-text">Product Name:</label>
            <input type="text" name="name" class="form-box" required>

            <label class="form-text">Description:</label>
            <input name="description" class="form-box-beschrijving"></textar>

            <label class="form-text">Price:</label>
            <input type="number" name="price" class="form-box" required>

            <button type="submit" name="add" class="form-knop">Modify!</button>
        </form>
        <!-- for deleting products: -->
        <form method="POST" action="/php/delete.php" class="form center column">
            <h1 class="form-text center">Delete Product</h1>
            <label class="form-text">Product ID:</label>
            <input type="number" name="id" class="form-box" required>

            <button type="submit" name="delete" class="form-knop">Delete!</button>
        </form>
    <br>
    <br>
</body>
</html>