# 4️⃣ Home Page — `home.php`

This is the main landing page. It displays a **welcome message** with the user's name if they're logged in, or a generic greeting if they're not. It also toggles between showing a Login link or a Logout link.

---

## 📄 What This File Does

- Starts the PHP session to check if a user is logged in
- Shows/hides Login and Logout links based on session data
- Displays a personalized welcome message
- Loads JavaScript that handles AJAX-based logout (no page reload)

---

## 🧑‍💻 The Code

There are **two versions** of the home page in this project. Complete **both**:

### Version 1: `home.php` (standalone — does NOT use header/footer includes)

Open `home.php` and replace the TODO comments with:

```php
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
```

### Version 2: `home_old.php` (uses header/footer includes + AJAX logout)

Open `home_old.php` and replace the TODO comments with:

```php
<?php
// home_old.php
session_start();
$pageTitle = 'Home';
require 'inc/header.inc.php';
?>

<a href="register.php">Register</a>
<a href="login.php" id="login">Login</a>
<a href="" id="logout">Logout</a>

<h1>Welcome to our great site <?= isset($_SESSION['first_name']) ? $_SESSION['first_name'] : 'New User!' ?></h1>
<div id="message"></div>
<script src="js/script.js"></script>

<?php require 'inc/footer.inc.php' ?>
```

---

## 🔍 Line-by-Line Explanation (home.php)

### Start the Session

```php
<?php session_start(); ?>
```

- This **must** be at the very top of the page (before any HTML output)
- It resumes the session that was started in `login.php` — so PHP can read `$_SESSION` data
- If the user isn't logged in, `$_SESSION` will simply be empty

### Toggle Login vs. Logout Links

```php
<?php if (isset($_SESSION["is_logged_in"])) { ?>
    <a href="logout.php" title="Logout">Logout</a>
<?php
} else { ?>
    <a href="login.php" title="Login">Login</a>
<?php
}
?>
```

- `isset()` checks if a variable exists and is not `null`
- If `$_SESSION["is_logged_in"]` exists → the user is logged in → show **Logout** link
- If it doesn't exist → the user is not logged in → show **Login** link
- Notice how PHP opens and closes (`<?php` and `?>`) to switch between PHP logic and HTML output

### Set the User's Name

```php
<?php
if (isset($_SESSION["first_name"])) {
    $first_name = $_SESSION["first_name"];
} else {
    $first_name = "Future User";
}
?>
```

- If the user is logged in, `$_SESSION["first_name"]` was set in `login.php`
- If not logged in, we use a default: `"Future User"`

### Display the Welcome Message

```php
<h1>Welcome to our site, <?= $first_name ?>!</h1>
```

- `<?= ... ?>` is a **PHP short echo tag** — it's shorthand for `<?php echo ... ?>`
- It prints the value of `$first_name` directly into the HTML

---

## 🔍 Line-by-Line Explanation (home_old.php)

### The Ternary Operator

```php
<h1>Welcome to our great site <?= isset($_SESSION['first_name']) ? $_SESSION['first_name'] : 'New User!' ?></h1>
```

This does the same thing as the `if/else` block in `home.php`, but in **one line** using a **ternary operator**:

```
condition ? value_if_true : value_if_false
```

| Part | Meaning |
|---|---|
| `isset($_SESSION['first_name'])` | Is the user logged in? |
| `? $_SESSION['first_name']` | If yes → show their name |
| `: 'New User!'` | If no → show "New User!" |

### The AJAX Elements

```php
<a href="login.php" id="login">Login</a>
<a href="" id="logout">Logout</a>
<div id="message"></div>
<script src="js/script.js"></script>
```

- The `id="login"` and `id="logout"` attributes are used by `script.js` to find these links
- JavaScript hides/shows them dynamically based on session status (via AJAX calls to `helper/is_logged_in.php`)
- `<div id="message">` is where the "You have been logged out" message appears
- You don't need to modify `script.js` — it's already complete

---

## ✅ How to Test

1. **Not logged in:** Go to `http://localhost/your-folder-name/home.php` — you should see "Welcome to our site, Future User!"
2. **Log in** through `login.php` — you should be redirected here and see "Welcome to our site, [Your Name]!"
3. The Logout link should appear instead of Login

---

## 📌 Key Concepts

- **`session_start()`** — Must be called on every page that needs to read or write session data
- **`isset()`** — Checks if a variable exists (prevents errors from accessing undefined variables)
- **`<?= ?>`** — Short echo tag for printing values in HTML
- **Ternary operator** (`? :`) — A compact if/else that returns a value
- **Mixing PHP and HTML** — Using `<?php ?>` tags to switch between PHP logic and HTML output

---

[⬅️ Previous: Login](3-login.md) | [Next: Logout ➡️](5-logout.md)
