<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SushiDaddy</title>
    <link rel="stylesheet" href="css\main.css">
    <link href='https://fonts.googleapis.com/css?family=Itim' rel='stylesheet'>
</head>
<body>
    <header>
        <nav>
            <img src="\img\SushiDaddyLogo.png" alt="Logo" class = "Logo">


            <div class="dropdown">
                <p class ="login">Login</p>
                <!-- <img src="img/SushiDaddyLogo.png" alt="firstStarsGoose" class = "nine-points"> -->
                <div class="dropdown-content">
                    <div class="dropper">
                        <form action="/php/login.php" method="POST">
                            <label for="username">Username</label>
                            <input required type="text" name="username">
                            <label for="password">Password</label>
                            <input required type="text" name="password">
                            <input type="submit" value="submit">
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    
</body>
</html>