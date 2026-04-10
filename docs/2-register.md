# 2️⃣ Registration — `register.php`

This page lets a new user create an account by filling out a form. The HTML form is already built — you need to write the PHP that **saves the user to the database**.

---

## 📄 What This File Does

When the user fills out the form and clicks "Register":
1. PHP collects the form data
2. Hashes the password so it's not stored in plain text
3. Inserts a new row into the `user` table
4. Shows a success or error message

---

## 🧑‍💻 The Code

Open `register.php` in VS Code. Replace the TODO comments (between the opening `<?php` and the closing `?>`) with:

```php
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
        echo "User successfully registered";
    }
}
?>
```

> ⚠️ Make sure you keep the HTML form and the footer include that are already below the `?>` closing tag.

---

## 🔍 Line-by-Line Explanation

### Includes

```php
$pageTitle = "Register";
require 'inc/header.inc.php';
require_once 'inc/db_connect.inc.php';
```

- `$pageTitle` — Sets the page title shown in the browser tab (used by `header.inc.php`)
- `require` — Includes the HTML header (DOCTYPE, `<head>`, opening `<body>`)
- `require_once` — Includes the database connection. `require_once` makes sure it's only loaded once even if multiple files try to include it

### Check if the Form Was Submitted

```php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
```

- `$_SERVER['REQUEST_METHOD']` tells you **how** the page was requested
- When someone just visits the page → it's a `GET` request (the form is displayed)
- When someone clicks "Register" (submits the form) → it's a `POST` request
- This `if` block only runs when the form is submitted

### Get the Form Data

```php
$email = $_POST['email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$password = hash('sha512', $_POST['password']);
```

- `$_POST` is a PHP **superglobal** — an array that contains all the form data
- `$_POST['email']` gets the value from the form field with `name="email"`
- The password is **hashed** using SHA-512 before storing it — this means the actual password is never saved in the database

> 💡 **Why hash?** If someone gains access to your database, they can't see the real passwords — only the hashed versions.

### Write the SQL Query

```php
$sql = "INSERT INTO user (first_name,last_name,email,password) ";
$sql .= "VALUES (:first_name,:last_name,:email,:password)";
```

- This is a SQL `INSERT` statement that adds a new row to the `user` table
- The `:first_name`, `:last_name`, etc. are **named placeholders** — they are NOT the actual values yet
- `.=` appends (adds to) the string — it's just splitting the query across two lines for readability

### Prepare and Execute

```php
$stmt = $db->prepare($sql);
$stmt->execute(["first_name" => $first_name, "last_name" => $last_name, "email" => $email, "password" => $password]);
```

- **`$db->prepare($sql)`** — Tells the database "here's the query I want to run" without running it yet
- **`$stmt->execute([...])`** — Runs the query and fills in the placeholders with the actual values
- This is called a **prepared statement** — it prevents **SQL injection attacks** (where a hacker tries to sneak malicious SQL through a form field)

### Check the Result

```php
if ($stmt->rowCount() == 0) {
    echo '<div class="alert alert-danger" role="alert">
    I am sorry, but I could not save that record for you.</div>';
} else {
    echo "User successfully registered";
}
```

- `$stmt->rowCount()` — Returns how many rows were affected by the query
- If `0` rows were affected → the insert failed → show error
- If `1` (or more) rows were affected → success!

---

## ✅ How to Test

1. Make sure Apache and MySQL are running in XAMPP
2. Go to `http://localhost/your-folder-name/register.php`
3. Fill out the form and click **Register**
4. You should see **"User successfully registered"**
5. Open **phpMyAdmin** → click the `ctec` database → click `user` → you should see your new user in the table

---

## 📌 Key Concepts

- **`$_POST`** — Contains form data sent via the POST method
- **`$_SERVER['REQUEST_METHOD']`** — Tells you if the page was accessed via GET or POST
- **`hash('sha512', ...)`** — One-way encryption for passwords
- **Prepared statements** — Secure way to run SQL queries with user input
- **Named placeholders** (`:name`) — Stand-ins for real values in SQL queries

---

[⬅️ Previous: DB Connection](1-db-connect.md) | [Next: Login ➡️](3-login.md)
