<?php
session_start();

require_once 'db.php';

$db = new db();
$conn = $db->get_connection();

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password !== $confirmPassword) {
        $message = "Passwords do not match.";
    } else {
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);

        if ($stmt->fetch()) {
            $message = "Username already taken.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
            $success = $stmt->execute([
                'username' => $username,
                'password' => $hashedPassword
            ]);

            if ($success) {
                $message = "Registration successful! <a href='login.php'>Login here</a>.";
            } else {
                $message = "Registration failed. Please try again.";
            }
        }
    }
}
?>

<h2>Register</h2>
<?php if (!empty($message)) echo "<p>$message</p>"; ?>

<form method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Confirm Password: <input type="password" name="confirm_password" required><br>
    <input type="submit" value="Register">
</form>
