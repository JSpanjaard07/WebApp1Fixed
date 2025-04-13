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
    Admin panel
    <br>
    <br>
    <br>
    <form action="/php/add_menu.php" method="POST">
        <label for="name">Name</label>
        <input required type="text" name="name">
        <label for="price">Price</label>
        <input required type="number" step="0.01" name="price">
        <label for="description">Description</label>
        <input required type="text" name="description">
        <input type="submit" value="submit">
    </form>
    <br>
    <br>
    bottom text
</body>
</html>