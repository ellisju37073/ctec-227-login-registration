<?php
// login.php
$pageTitle = 'Login';
require 'inc/header.inc.php';
require_once 'inc/db_connect.inc.php';

// TODO 1: Check if the form was submitted using $_SERVER['REQUEST_METHOD']

    // TODO 2: Get the email from $_POST

    // TODO 3: Hash the password from $_POST using hash('sha512', ...)

    // TODO 4: Write a SQL SELECT query to find a user matching the email AND password
    //         Use named placeholders :email and :password

    // TODO 5: Prepare and execute the query using PDO ($db->prepare, $stmt->execute)

    // TODO 6: Check if a matching user was found ($stmt->rowCount())
    //         If found:
    //           - Fetch the user row
    //           - Start a session with session_start()
    //           - Store "is_logged_in" and "first_name" in $_SESSION
    //           - Redirect to home.php using header("Location: home.php")
    //         If not found:
    //           - Echo an error message like "Invalid user credentials"

?>

<form action="login.php" method="POST">
    <label for="email">Email</label>
    <br><br>
    <input type="email" name="email" id="email" required>
    <br><br>
    <label for="password">Password</label>
    <span id="showPassword" onclick="showPassword();">Show Password</span>
    <br><br>
    <input type="password" name="password" id="password" required>
    <br><br>
    <input type="submit" value="Login">
</form>

<script src="js/script.js"></script>

<?php require 'inc/footer.inc.php'; ?>