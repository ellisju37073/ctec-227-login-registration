<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home PHP</title>
</head>

<body>
    <header>
        <a href="register.php" title="Register">Register</a>
        <?php if (isset($_SESSION["is_logged_in"])) { ?>
            <a href="logout.php" title="Logout">Logout</a>
        <?php
        } else { ?>
            <a href="login.php" title="Login">Login</a>
        <?php
        }
        ?>
    </header>
    <?php
    if (isset($_SESSION["first_name"])) {
        $first_name = $_SESSION["first_name"];
    } else {
        $first_name = "Future User";
    }
    ?>
    <h1>Welcome to our site, <?= $first_name ?>!</h1>
</body>

</html>