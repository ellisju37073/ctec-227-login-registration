# 1️⃣ Database Connection — `inc/db_connect.inc.php`

This is the **first file you should complete**. It creates the connection to your MySQL database. Every other PHP page in this project uses this file.

---

## 📄 What This File Does

This file uses **PDO (PHP Data Objects)** to connect PHP to your MySQL database running in XAMPP. When other files like `login.php` or `register.php` include this file with `require_once`, they get access to the `$db` variable to run queries.

---

## 🧑‍💻 The Code

Open `inc/db_connect.inc.php` in VS Code and replace the TODO comments with the following code:

```php
<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ctec';

// DSN - Data Source Name
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

// Create a PDO Instance
$db = new PDO($dsn, $user, $password);
// Set PDO default data type to be returned
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
```

---

## 🔍 Line-by-Line Explanation

### Step 1 — Connection Variables

```php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ctec';
```

| Variable | Value | Why |
|---|---|---|
| `$host` | `'localhost'` | The database is on the same machine (XAMPP) |
| `$user` | `'root'` | XAMPP's default MySQL username |
| `$password` | `''` | XAMPP's default has **no password** (empty string) |
| `$dbname` | `'ctec'` | The database you created in phpMyAdmin |

### Step 2 — Build the DSN

```php
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
```

- **DSN** stands for **Data Source Name** — it tells PDO *which* database to connect to
- The `.` (dot) operator **concatenates** (joins) strings together in PHP
- The result is: `mysql:host=localhost;dbname=ctec`

### Step 3 — Create the PDO Connection

```php
$db = new PDO($dsn, $user, $password);
```

- `new PDO(...)` creates a new database connection object
- We pass it the DSN, username, and password
- The result is stored in `$db` — this is the variable you'll use in other files to run queries

### Step 4 — Set the Fetch Mode

```php
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
```

- This tells PDO to return database rows as **objects** (instead of arrays)
- With objects, you access columns like `$row->first_name` instead of `$row['first_name']`
- This is used later in `login.php` when we fetch the logged-in user's data

---

## ✅ How to Test

After writing this code, you won't see anything in the browser yet — this file doesn't output anything. But if there's an error (like wrong database name), you'll see a PHP error when you load any page that includes it.

Try visiting `http://localhost/your-folder-name/home.php`. If you see the page without any database errors, your connection is working!

---

## 📌 Key Concepts

- **PDO** — A PHP extension for connecting to databases securely
- **DSN** — A connection string that tells PDO where the database is
- **`setAttribute()`** — Configures how PDO behaves (here: return objects)
- **`require_once`** — How other files include this connection (only loads it once)

---

[⬅️ Back to README](../README.md) | [Next: Registration ➡️](2-register.md)
