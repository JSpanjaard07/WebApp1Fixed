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
        <!-- <ul class="ul">
                    <li><a class = "link" href="admin_panel.php">Admin</a></li>
                    <li><a class = "link" href="light-contact.html">Contact</a></li>
                    <li><a class = "link" href="light-about.html">About</a></li>
                    <li><a class = "link" href="light-projects.html">Projects</a></li>
        </ul> -->
            
        </nav>
    </header>


    <form action="/php/login.php" method="POST">
        <label for="username">Username</label>
        <input required type="text" name="username">
        <label for="password">Password</label>
        <input required type="text" name="password">
        <input type="submit" value="submit">
    </form>
    
</body>
</html>