# 6️⃣ AJAX Helpers — `helper/is_logged_in.php` & `helper/logout_ajax.php`

These two small PHP files are called by **JavaScript** (in `script.js`) using the **fetch API**. They return **JSON responses** instead of HTML, which allows the page to update **without a full reload**.

---

## 📄 What These Files Do

| File | Purpose | Called By |
|---|---|---|
| `helper/is_logged_in.php` | Checks if the user is currently logged in | `script.js` on page load |
| `helper/logout_ajax.php` | Logs the user out via AJAX | `script.js` when Logout is clicked |

> 💡 **What is AJAX?** AJAX (Asynchronous JavaScript and XML) lets JavaScript make requests to the server **in the background** — without reloading the whole page. In this project, JavaScript calls these PHP files and uses the JSON responses to update the page dynamically.

---

## 🧑‍💻 The Code

### `helper/is_logged_in.php`

Open this file and replace the TODO comments with:

```php
<?php
// is_logged_in.php
session_start();
if (isset($_SESSION['first_name'])) {
    echo json_encode(["status" => 'yes']);
} else {
    echo json_encode(["status" => 'no']);
}
```

### `helper/logout_ajax.php`

Open this file and replace the TODO comments with:

```php
<?php
// logout_ajax.php
session_start();
session_destroy();
echo json_encode(['status' => 'success']);
```

---

## 🔍 Line-by-Line Explanation

### `is_logged_in.php`

```php
session_start();
```
- Resumes the session so we can check if `$_SESSION['first_name']` exists

```php
if (isset($_SESSION['first_name'])) {
    echo json_encode(["status" => 'yes']);
} else {
    echo json_encode(["status" => 'no']);
}
```

- `isset($_SESSION['first_name'])` — Checks if the user has logged in (the session variable was set in `login.php`)
- `json_encode(["status" => "yes"])` — Converts the PHP array `["status" => "yes"]` into a **JSON string**: `{"status":"yes"}`
- `echo` — Sends that JSON string back to JavaScript as the response

**What JavaScript receives:**
```json
{"status": "yes"}
```
or
```json
{"status": "no"}
```

JavaScript then reads `res.status` and shows or hides the Login/Logout links accordingly.

---

### `logout_ajax.php`

```php
session_start();
session_destroy();
echo json_encode(['status' => 'success']);
```

- Same pattern as `logout.php` but instead of **redirecting**, it returns a **JSON response**
- JavaScript receives `{"status": "success"}` and updates the page:
  - Hides the Logout link
  - Shows the Login link
  - Displays "You have been logged out"
  - Changes the heading to "Welcome to our Site!"

This all happens **without the page reloading** — that's the power of AJAX!

---

## 🔍 How JavaScript Uses These Files

You don't need to modify `script.js`, but here's how it works for context:

```javascript
// On page load — check if user is logged in
fetch('helper/is_logged_in.php')
    .then(res => res.json())
    .then(function (res) {
        if (res.status == 'yes') {
            // Hide Login link, show Logout link
        }
    })
```

```javascript
// When Logout is clicked
fetch('helper/logout_ajax.php')
    .then(res => res.json())
    .then(function (res) {
        if (res.status == 'success') {
            // Show Login link, hide Logout link
            // Display "You have been logged out" message
        }
    })
```

- `fetch(...)` — Makes an HTTP request to the PHP file
- `.then(res => res.json())` — Parses the response as JSON
- `.then(function(res) { ... })` — Uses the parsed data (`res.status`) to update the page

---

## ✅ How to Test

1. **Log in** through `login.php`
2. Go to `home_old.php` (this version uses the AJAX logout)
3. Click **Logout** — you should see:
   - The page does **NOT** reload
   - A "You have been logged out" message appears
   - The Logout link disappears and the Login link appears
   - The heading changes to a generic welcome message

You can also test `is_logged_in.php` directly by visiting:
```
http://localhost/your-folder-name/helper/is_logged_in.php
```
You'll see raw JSON: `{"status":"yes"}` or `{"status":"no"}`

---

## 📌 Key Concepts

- **`json_encode()`** — Converts a PHP array into a JSON string
- **JSON** — A data format (`{"key": "value"}`) that JavaScript can easily read
- **AJAX** — Making server requests from JavaScript without reloading the page
- **fetch API** — Modern JavaScript way to make HTTP requests
- **`echo`** — In this context, sends the JSON response back to JavaScript
- **API endpoint** — A URL that returns data (not HTML) — that's what these helper files are

---

[⬅️ Previous: Logout](5-logout.md) | [Back to README ➡️](../README.md)
