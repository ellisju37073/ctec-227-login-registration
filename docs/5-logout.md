# 5️⃣ Logout — `logout.php`

This is the simplest file in the project — just 3 lines of PHP. It ends the user's session and sends them back to the home page.

---

## 📄 What This File Does

1. Starts (resumes) the current session
2. Destroys it — removing all session data
3. Redirects the user back to `home.php`

---

## 🧑‍💻 The Code

Open `logout.php` in VS Code and replace the TODO comments with:

```php
<?php
// logout.php
session_start();
session_destroy();
header("Location: home.php");
```

That's it — no closing `?>` tag needed (and it's actually best practice to leave it off in PHP-only files to prevent accidental whitespace issues).

---

## 🔍 Line-by-Line Explanation

### Start the Session

```php
session_start();
```

- You have to **start** (resume) the session before you can destroy it
- This loads the existing session data so PHP knows which session to delete

### Destroy the Session

```php
session_destroy();
```

- Removes **all** session data on the server for this user
- After this, `$_SESSION["is_logged_in"]` and `$_SESSION["first_name"]` no longer exist
- The session cookie in the browser becomes invalid

### Redirect to Home

```php
header("Location: home.php");
```

- Sends an HTTP redirect to the browser — the user is immediately taken to `home.php`
- Since the session is destroyed, `home.php` will now show "Future User" instead of the user's name

> 💡 **Why `session_start()` before `session_destroy()`?** PHP needs to know *which* session to destroy. `session_start()` loads the session tied to the user's browser cookie, and then `session_destroy()` removes that specific session.

---

## ✅ How to Test

1. **Log in** first (through `login.php`)
2. Verify you see your name on `home.php`
3. Click the **Logout** link (or go to `http://localhost/your-folder-name/logout.php`)
4. You should be redirected to `home.php` and see "Future User" instead of your name
5. The Login link should appear instead of Logout

---

## 📌 Key Concepts

- **`session_start()`** — Resumes an existing session (required before any session operation)
- **`session_destroy()`** — Deletes all session data for the current user
- **`header("Location: ...")`** — HTTP redirect (must be called before any HTML output)
- **No closing `?>` tag** — Best practice for PHP-only files to avoid whitespace issues

---

[⬅️ Previous: Home Page](4-home.md) | [Next: AJAX Helpers ➡️](6-ajax-helpers.md)
