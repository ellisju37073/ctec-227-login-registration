<?php
// register.php
$pageTitle = "Register";
require 'inc/header.inc.php';
require_once 'inc/db_connect.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = hash('sha512', $_POST['password']);

    $sql = "INSERT INTO user (first_name,last_name,email,password) ";
    $sql .= "VALUES (:first_name,:last_name,:email,:password)";

    $stmt = $db->prepare($sql);
    $stmt->execute(["first_name" => $first_name, "last_name" => $last_name, "email" => $email, "password" => $password]);

    if ($stmt->rowCount() == 0) {
        echo '<div class="alert alert-danger" role="alert">
        I am sorry, but I could not save that record for you.</div>';
    } else {
        // header("Location: display-records.php?message=The record for $first has been created.");
        echo "User successfully registered";
    }
}
?>

<h1>Register</h1>
<form action="register.php" method="POST">
    <label for="email">Email</label>
    <input type="email" id="email" required name="email">
    <br><br>
    <label for="password">Password</label>
    <input type="password" id="password" required name="password">
    <br><br>
    <label for="first_name">First Name</label>
    <input type="text" id="first_name" required name="first_name">
    <br><br>
    <label for="last_name">Last Name</label>
    <input type="text" id="last_name" required name="last_name">
    <br><br>
    <input type="submit" value="Register">
</form>
<?php require 'inc/footer.inc.php'; ?>