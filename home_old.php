<?php
// home_old.php (version using header/footer includes + AJAX logout via script.js)

// TODO 1: Start the session

$pageTitle = 'Home';
require 'inc/header.inc.php';
?>

<a href="register.php">Register</a>
<a href="login.php" id="login">Login</a>
<a href="" id="logout">Logout</a>

<!-- TODO 2: Display a welcome message using a PHP short echo tag <?= ?>
     If $_SESSION['first_name'] is set, show the user's first name.
     If not, show 'New User!' instead.
     Hint: Use a ternary operator — isset($_SESSION['first_name']) ? ... : ... -->
<h1>Welcome to our great site!</h1>

<div id="message"></div>
<script src="js/script.js"></script>

<?php require 'inc/footer.inc.php' ?>