<?php
session_start();

require_once("php/db.php");

$db = new db();
$conn = $db->get_connection();
$result = [];

$sql = "SELECT * FROM menu";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $search = "%" . $_POST["search"] . "%";
    $sql = "SELECT * FROM menu WHERE name LIKE :search";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['search' => $search]);
    $result = $stmt->fetchAll();
}

$template = '
<div class="gerecht-item space-between column">
    <div>
        <h1 class="gerecht-naam">%s</h1>
        <h2 class="gerecht-beschrijving">%s</h2>
    </div>
    <h2 class="gerecht-prijs">€%s</h2>
</div>
';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SushiDaddy</title>
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <img src="/img/SushiDaddyLogo.png" alt="Logo" class="Logo">

            <div class="dropdown">
                <p class="login">Menu</p>
                <div class="dropdown-content">
                    <div class="dropper">
                        <?php if (isset($_SESSION["user_id"])): ?>
                            <h1>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>
                            <a href="php/logout.php">Logout</a>
                        <?php else: ?>
                            <a href="php/login.php">Login</a>
                            <a href="php/register.php">Register</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="bigBody">
        <main>
            <form method="POST" action="index.php" class="zoekbox column">
                <input type="text" name="search" class="filteren">
                <button type="submit" class="zoeken">Zoeken</button>
            </form>

            <section class="generale-spacer row">
                <?php
                foreach ($result as $row) {
                    echo sprintf($template, $row["name"], $row["description"], $row["price"]);
                }
                ?>
            </section>
        </main>
    </div>
</body>
</html>
