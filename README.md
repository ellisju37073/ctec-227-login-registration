# CTEC 227 — Login & Registration Application

A PHP + MySQL web application that demonstrates **user registration**, **login authentication**, **session management**, and **AJAX-based logout**. This project is part of the CTEC 227 curriculum.

---

## 📋 Table of Contents

1. [Prerequisites](#-prerequisites)
2. [Step 1 — Install XAMPP](#-step-1--install-xampp)
3. [Step 2 — Accept the GitHub Classroom Assignment](#-step-2--accept-the-github-classroom-assignment)
4. [Step 3 — Clone Your Repository into XAMPP](#-step-3--clone-your-repository-into-xampp)
5. [Step 4 — Start XAMPP Services](#-step-4--start-xampp-services)
6. [Step 5 — Create the Database](#-step-5--create-the-database)
7. [Step 6 — Run the Application](#-step-6--run-the-application)
8. [Assignment — What You Need to Build](#-assignment--what-you-need-to-build)
9. [Project Structure](#-project-structure)
10. [How the Application Works](#-how-the-application-works)
11. [Troubleshooting](#-troubleshooting)

---

## ✅ Prerequisites

Before you begin, make sure you have the following installed on your computer:

| Software | Purpose | Download Link |
|---|---|---|
| **XAMPP** | Runs Apache (web server), MySQL (database), and PHP | [https://www.apachefriends.org](https://www.apachefriends.org) |
| **Visual Studio Code** | Code editor for editing PHP, HTML, CSS, and JS files | [https://code.visualstudio.com](https://code.visualstudio.com) |
| **Git** | Version control (used by GitHub Classroom) | [https://git-scm.com](https://git-scm.com) |
| **Web Browser** | Chrome, Firefox, or Edge to view the app | You likely already have one |

### Recommended VS Code Extensions

After installing VS Code, install these extensions for a better experience:

- **PHP Intelephense** — PHP code intelligence and autocomplete
- **Live Server** *(optional)* — useful for static files, but PHP files must run through XAMPP

---

## 📥 Step 1 — Install XAMPP

XAMPP provides everything this project needs: **Apache** (web server), **MySQL/MariaDB** (database), and **PHP** (server-side language).

### macOS

1. Download the macOS installer from [https://www.apachefriends.org](https://www.apachefriends.org)
2. Open the `.dmg` file and drag XAMPP to your Applications folder
3. Open **XAMPP** from your Applications folder (you may need to allow it in **System Settings → Privacy & Security**)

### Windows

1. Download the Windows installer from [https://www.apachefriends.org](https://www.apachefriends.org)
2. Run the installer (use the default settings)
3. **Important:** Install XAMPP to `C:\xampp` (the default location)
4. Open the **XAMPP Control Panel** from the Start Menu

---

## 📂 Step 2 — Accept the GitHub Classroom Assignment

Your instructor will provide you with a **GitHub Classroom invitation link**. This link will automatically create your own personal copy of this project.

1. **Click the assignment link** provided by your instructor (it will look something like `https://classroom.github.com/a/...`)
2. If prompted, **sign in to GitHub** (or create a free account at [https://github.com](https://github.com) if you don't have one)
3. **Accept the assignment** — GitHub Classroom will create a private repository for you
4. Wait a few seconds for the repository to be created — the page will show a link to your new repo when it's ready
5. Click the link to go to **your repository page** on GitHub
6. Click the green **"<> Code"** button and **copy the HTTPS URL** (you'll need this in the next step)

> 📌 Your repo will have a name like `ctec-227-login-registration-yourusername`. This is **your own copy** — any changes you make and push will only affect your repo.

---

## 📂 Step 3 — Clone Your Repository into XAMPP

Now you need to clone your repository **into XAMPP's web root folder** (`htdocs`) so that Apache can serve the PHP files.

### Find Your XAMPP Web Root (htdocs)

| Operating System | htdocs Location |
|---|---|
| **macOS** | `/Applications/XAMPP/htdocs/` |
| **Windows** | `C:\xampp\htdocs\` |

### Clone the Repo

1. Open a **Terminal** (macOS) or **Git Bash / Command Prompt** (Windows)
2. Navigate to your htdocs folder:

   **macOS:**
   ```bash
   cd /Applications/XAMPP/htdocs
   ```

   **Windows:**
   ```bash
   cd C:\xampp\htdocs
   ```

3. Clone your repository (paste the URL you copied from GitHub):
   ```bash
   git clone https://github.com/YOUR-ORG/ctec-227-login-registration-yourusername.git
   ```
   > 📌 Replace the URL above with the actual URL you copied in Step 2.

4. You should now have a folder like:
   ```
   htdocs/
   └── ctec-227-login-registration-yourusername/
       ├── home.php
       ├── login.php
       ├── register.php
       ├── ...
   ```

### Open the Project in VS Code

```bash
code ctec-227-login-registration-yourusername
```

Or open VS Code manually and use **File → Open Folder** to open the cloned folder inside htdocs.

---

## 🚀 Step 4 — Start XAMPP Services

You need to start **two services**: Apache and MySQL.

### macOS

1. Open the **XAMPP** application
2. Go to the **Manage Servers** tab
3. Start **Apache Web Server** (click it, then click **Start**)
4. Start **MySQL Database** (click it, then click **Start**)
5. Both should show a **green light** when running

### Windows

1. Open the **XAMPP Control Panel**
2. Click **Start** next to **Apache**
3. Click **Start** next to **MySQL**
4. Both should highlight **green** when running

### ✅ Verify It's Working

Open your browser and go to:
```
http://localhost
```
You should see the XAMPP welcome/dashboard page. If you see this, Apache is running correctly!

---

## 🗄️ Step 5 — Create the Database

The application needs a MySQL database called **`ctec`** with a **`user`** table. Follow these steps to set it up using **phpMyAdmin**.

### 5a — Open phpMyAdmin

In your browser, go to:
```
http://localhost/phpmyadmin
```

### 5b — Create the Database

1. Click **"New"** in the left sidebar
2. In the **"Database name"** field, type: `ctec`
3. Select **`utf8_general_ci`** from the collation dropdown (or leave the default)
4. Click **Create**

### 5c — Import the Table Structure

1. Click on the **`ctec`** database in the left sidebar (to select it)
2. Click the **"Import"** tab at the top
3. Click **"Choose File"** and navigate to the `sql/` folder inside your cloned project
4. Select the file: **`create-database.sql`**
5. Click **"Go"** at the bottom of the page
6. You should see a success message: *"Import has been successfully finished"*

### 5d — Verify the Table Was Created

1. Click on the **`ctec`** database in the left sidebar
2. You should see a table called **`user`** with the following columns:

| Column | Type | Description |
|---|---|---|
| `user_id` | INT (Auto Increment) | Unique ID for each user |
| `email` | VARCHAR(64) | User's email address (unique) |
| `first_name` | VARCHAR(30) | User's first name |
| `last_name` | VARCHAR(30) | User's last name |
| `password` | VARCHAR(128) | Hashed password (SHA-512) |

---

## 🌐 Step 6 — Run the Application

With Apache and MySQL running, open your browser and go to:

```
http://localhost/your-folder-name/home.php
```

> 📌 Replace `your-folder-name` with the actual name of your cloned folder inside htdocs (e.g., `ctec-227-login-registration-yourusername`).

### Test the Application

1. **Register a new user:**
   - Click the **Register** link
   - Fill out the form (email, password, first name, last name)
   - Click **Register** — you should see *"User successfully registered"*

2. **Log in:**
   - Click **Login** (or go to `login.php`)
   - Enter the email and password you just registered with
   - Click **Login** — you should be redirected to `home.php` and see a welcome message with your first name

3. **Log out:**
   - Click **Logout** — the page will update and show "New User!" instead of your name

---

## ✏️ Assignment — What You Need to Build

The project structure, HTML forms, CSS, and JavaScript are already provided. **Your job is to write the PHP logic.** Each file contains `TODO` comments that tell you exactly what to implement.

### Work through the files in this order:

### 1️⃣ Database Connection — `inc/db_connect.inc.php`
Set up the PDO connection to MySQL. This file is used by every other PHP page.

| TODO | What to Do |
|---|---|
| 1 | Create variables for host, user, password, and database name |
| 2 | Build the DSN (Data Source Name) string |
| 3 | Create a new `PDO` instance |
| 4 | Set the default fetch mode to `PDO::FETCH_OBJ` |

### 2️⃣ Registration — `register.php`
Allow a new user to create an account.

| TODO | What to Do |
|---|---|
| 1 | Check if the form was submitted (`$_SERVER['REQUEST_METHOD']`) |
| 2 | Get email, first_name, last_name from `$_POST` |
| 3 | Hash the password using `hash('sha512', ...)` |
| 4 | Write a SQL `INSERT INTO` query with named placeholders |
| 5 | Prepare and execute the query with PDO |
| 6 | Check `$stmt->rowCount()` and echo a success or error message |

### 3️⃣ Login — `login.php`
Authenticate an existing user and start a session.

| TODO | What to Do |
|---|---|
| 1 | Check if the form was submitted |
| 2 | Get the email from `$_POST` |
| 3 | Hash the password using `hash('sha512', ...)` |
| 4 | Write a SQL `SELECT` query with named placeholders |
| 5 | Prepare and execute the query with PDO |
| 6 | If a match is found: start a session, store user data in `$_SESSION`, redirect to `home.php`. If not: show an error. |

### 4️⃣ Home Page — `home.php`
Display a welcome message based on session data.

| TODO | What to Do |
|---|---|
| 1 | Start the session |
| 2 | Show/hide Login vs. Logout links based on `$_SESSION` |
| 3 | Set `$first_name` from session or use a default value |
| 4 | Display the welcome message using `<?= ?>` |

### 5️⃣ Logout — `logout.php`
End the user's session and redirect.

| TODO | What to Do |
|---|---|
| 1 | Start the session |
| 2 | Destroy the session |
| 3 | Redirect to `home.php` |

### 6️⃣ AJAX Helpers — `helper/is_logged_in.php` & `helper/logout_ajax.php`
These are called by JavaScript to check login status and log out without a page reload.

**`is_logged_in.php`:**
| TODO | What to Do |
|---|---|
| 1 | Start the session |
| 2 | Return a JSON response: `{"status": "yes"}` or `{"status": "no"}` |

**`logout_ajax.php`:**
| TODO | What to Do |
|---|---|
| 1 | Start the session |
| 2 | Destroy the session |
| 3 | Return a JSON response: `{"status": "success"}` |

### ✅ How to Know You're Done

- [ ] You can **register** a new user and see "User successfully registered"
- [ ] You can **log in** with that user and see your first name on the home page
- [ ] You can **log out** and the page shows "New User!" or "Future User"
- [ ] The Login/Logout links toggle correctly without a page reload (AJAX)

### 📤 Submitting Your Work

Once everything works, push your code back to GitHub:

```bash
git add .
git commit -m "Completed login and registration assignment"
git push
```

Your instructor will be able to see your work in GitHub Classroom.

---

## 📁 Project Structure

Here's what each file and folder does:

```
project-root/
│
├── home.php                  # Main homepage — shows login/logout/register links
├── home_old.php              # Alternate version of home (reference only)
├── login.php                 # Login form & authentication logic
├── register.php              # Registration form & user creation logic
├── logout.php                # Destroys session and redirects to home
│
├── css/
│   └── style.css             # Styles for login/logout link visibility & password toggle
│
├── inc/                      # "Includes" — reusable PHP components
│   ├── db_connect.inc.php    # Database connection using PDO
│   ├── header.inc.php        # HTML <head> and opening <body> tag
│   └── footer.inc.php        # Closing </body> and </html> tags
│
├── helper/                   # AJAX helper endpoints
│   ├── is_logged_in.php      # Returns JSON: checks if user session exists
│   └── logout_ajax.php       # Returns JSON: destroys session via AJAX
│
├── js/
│   ├── script.js             # Show/hide password toggle & AJAX logout logic
│   └── json.php              # Example: returns sample JSON data
│
└── sql/
    ├── create-database.sql   # ✅ Use this to set up your database
    └── user-registrations.sql # Reference SQL dump (not needed for setup)
```

---

## 🔍 How the Application Works

### Database Connection (`inc/db_connect.inc.php`)
- Uses **PDO** (PHP Data Objects) to connect to MySQL
- Connection settings: `localhost`, user `root`, no password, database `ctec`
- This is the default XAMPP MySQL configuration — no changes needed

### Registration Flow (`register.php`)
1. User fills out the registration form
2. On form submit (`POST` request), PHP collects the form data
3. The password is hashed using **SHA-512** via `hash('sha512', $password)`
4. A `INSERT INTO` SQL query saves the user to the `user` table using a **prepared statement** (prevents SQL injection)

### Login Flow (`login.php`)
1. User enters email and password
2. PHP hashes the entered password and queries the database for a matching email + password
3. If a match is found:
   - A **PHP session** is started (`session_start()`)
   - `$_SESSION["is_logged_in"]` and `$_SESSION["first_name"]` are set
   - User is redirected to `home.php`
4. If no match: an error message is shown

### Session Management (`home.php`)
- `session_start()` is called at the top of the page
- If `$_SESSION['first_name']` exists → user sees their name in the welcome message
- If not → they see "New User!"
- JavaScript (`script.js`) uses **fetch API** to call `helper/is_logged_in.php` and toggle the Login/Logout links dynamically

### Logout
- **Standard logout** (`logout.php`): Destroys the session and redirects to home
- **AJAX logout** (`helper/logout_ajax.php`): Destroys the session and returns JSON — used by `script.js` to update the page **without a full reload**

---

## 🛠️ Troubleshooting

### "This site can't be reached" / localhost not working
- **Cause:** Apache isn't running
- **Fix:** Open XAMPP and make sure Apache is started (green light)

### "Access denied for user 'root'@'localhost'"
- **Cause:** MySQL password is set, but the code expects no password
- **Fix:** The default XAMPP MySQL root user has **no password**. If you changed it, update `$password` in `inc/db_connect.inc.php`

### "Table 'ctec.user' doesn't exist"
- **Cause:** The database or table hasn't been created yet
- **Fix:** Follow [Step 5](#-step-5--create-the-database) to create the database and import the SQL file

### "Port 80 is already in use" (Windows)
- **Cause:** Another program (like Skype or IIS) is using port 80
- **Fix:** In XAMPP Control Panel, click **Config** next to Apache → change the port to `8080`. Then access the app at `http://localhost:8080/...`

### "Port 3306 is already in use"
- **Cause:** Another MySQL instance is running
- **Fix:** Stop the other MySQL service, or change XAMPP's MySQL port in the XAMPP config

### Registered but can't log in
- **Cause:** Passwords are hashed with SHA-512. The sample data in `user-registrations.sql` has **plaintext passwords** that won't match the hashed login check
- **Fix:** Register a **new user** through the app — it will hash the password correctly. Use that new account to log in.

### Page shows raw PHP code instead of rendering
- **Cause:** You opened the file directly in the browser (e.g., `file:///...`) instead of through Apache
- **Fix:** Always access pages through `http://localhost/your-folder-name/...`

---

## 📚 Key Concepts Covered

- ✅ PHP form handling (`$_POST`, `$_SERVER['REQUEST_METHOD']`)
- ✅ PDO database connections and **prepared statements**
- ✅ Password hashing with `hash('sha512', ...)`
- ✅ PHP sessions (`session_start()`, `$_SESSION`)
- ✅ Page redirects with `header("Location: ...")`)
- ✅ PHP includes (`require`, `require_once`)
- ✅ JavaScript Fetch API for AJAX requests
- ✅ JSON responses from PHP endpoints
- ✅ DOM manipulation with `document.querySelector()`)

---

> **Questions?** Reach out to your instructor or post in the class discussion board.
