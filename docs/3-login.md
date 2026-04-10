# 3️⃣ Login — `login.php`

This page lets an existing user log in by entering their email and password. The HTML form is already built — you need to write the PHP that **checks the credentials and starts a session**.

---

## 📄 What This File Does

When the user fills out the form and clicks "Login":
1. PHP collects the email and password
2. Hashes the password (to compare against the hashed version in the database)
3. Queries the database for a matching user
4. If found: starts a **session** and redirects to the home page
5. If not found: shows an error message

---

## 🧑‍💻 The Code

Open `login.php` in VS Code. Replace the TODO comments (between the opening `<?php` and the closing `?>`) with:

```php
<?php
// login.php
$pageTitle = 'Login';
require 'inc/header.inc.php';
require_once 'inc/db_connect.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = hash('sha512', $_POST['password']);

    $sql = "SELECT * FROM user WHERE email=:email AND password=:password LIMIT 1";

    $stmt = $db->prepare($sql);
    $stmt->execute(["email" => $email, "password" => $password]);

    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch();
        session_start();
        $_SESSION["is_logged_in"] = 1;
        $_SESSION["first_name"] = $row->first_name;
        header("Location: home.php");
    } else {
        echo "Invalid user credentials";
    }
}

?>
```

> ⚠️ Make sure you keep the HTML form, the script tag, and the footer include that are already below the `?>` closing tag.

---

## 🔍 Line-by-Line Explanation

### Check if the Form Was Submitted & Get Data

```php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = hash('sha512', $_POST['password']);
```

- Same pattern as `register.php` — only runs when the form is submitted
- The password is hashed using the **same algorithm** (SHA-512) as registration — this is critical! The hashed version must match what's stored in the database

### Query the Database

```php
$sql = "SELECT * FROM user WHERE email=:email AND password=:password LIMIT 1";

$stmt = $db->prepare($sql);
$stmt->execute(["email" => $email, "password" => $password]);
```

- `SELECT *` — Get all columns from the `user` table
- `WHERE email=:email AND password=:password` — Only return rows where **both** the email and password match
- `LIMIT 1` — Only return one result (there should only be one matching user anyway)
- Uses prepared statements just like `register.php` for security

### If a Match is Found — Start a Session

```php
if ($stmt->rowCount() == 1) {
    $row = $stmt->fetch();
    session_start();
    $_SESSION["is_logged_in"] = 1;
    $_SESSION["first_name"] = $row->first_name;
    header("Location: home.php");
```

This is the most important part — let's break it down:

| Line | What It Does |
|---|---|
| `$stmt->rowCount() == 1` | Checks if exactly one user was found |
| `$row = $stmt->fetch()` | Gets the user's data as an object (because we set `FETCH_OBJ` in `db_connect`) |
| `session_start()` | Starts a PHP **session** — this creates a temporary storage area on the server tied to this user's browser |
| `$_SESSION["is_logged_in"] = 1` | Stores a flag so other pages know the user is logged in |
| `$_SESSION["first_name"] = $row->first_name` | Stores the user's first name from the database (`$row->first_name` works because we used `FETCH_OBJ`) |
| `header("Location: home.php")` | **Redirects** the browser to `home.php` — the user never sees `login.php` after a successful login |

> 💡 **What is a session?** A session is like a server-side "memory" for a user. When you call `session_start()`, PHP creates a unique ID for that user and stores it in a **cookie** in their browser. On every page load, PHP checks that cookie and loads the user's session data. That's how `home.php` knows who you are!

### If No Match — Show Error

```php
} else {
    echo "Invalid user credentials";
}
```

- If `rowCount()` is 0, no user matched that email + password combo
- This could mean the email is wrong, the password is wrong, or the user never registered

---

## ✅ How to Test

1. Make sure you've already **registered a user** (using `register.php`)
2. Go to `http://localhost/your-folder-name/login.php`
3. Enter the **same email and password** you used to register
4. Click **Login**
5. You should be **redirected to `home.php`** and see "Welcome to our great site [Your Name]!"
6. Try logging in with a wrong password — you should see "Invalid user credentials"

---

## 📌 Key Concepts

- **`session_start()`** — Starts or resumes a PHP session
- **`$_SESSION`** — A superglobal array that persists data across page loads for the same user
- **`$stmt->fetch()`** — Retrieves one row from the query results
- **`$row->first_name`** — Accessing a column as an object property (because of `FETCH_OBJ`)
- **`header("Location: ...")`** — Redirects the browser to a different page
- **`LIMIT 1`** — SQL clause to return only one row

---

[⬅️ Previous: Registration](2-register.md) | [Next: Home Page ➡️](4-home.md)
