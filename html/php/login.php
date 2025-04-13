<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === "admin" && $password === "admin") {

        session_start();
        $_SESSION["logged_in"] = true;
        header("location: /admin");
    } else {
        header("location: /");
    }
}
