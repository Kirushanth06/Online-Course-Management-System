# Online Course Management System Walkthrough

I have successfully built the complete PHP, MySQL, and HTML/CSS/JS mini-project in your `Online Course Management System` directory (`c:\Users\Have a Nice Day\Desktop\Online Course Management System`).

## What Was Accomplished
- **Database Script**: Created `database.sql` to instantly build the 5 required tables (`users`, `courses`, `enrollments`, `messages`, `admin`) and insert 10 sample records for each.
- **Backend Connection**: Created `config/db.php` to handle MySQL connections and initialize secure PHP sessions.
- **UI Assets**: Built a responsive, modern layout entirely using Vanilla CSS (`css/style.css`) and plain JavaScript form validation logic (`js/validation.js`).
- **Public Pages**:
  - `index.php` (Home page)
  - `about.php` (Project/App background)
  - `courses.php` (Read-only list of available courses)
- **Forms & Auth**:
  - `contact.php` (Saves inquiries to the DB)
  - `register.php` (Handles user signups)
  - `login.php` (Authenticates against DB and stores user data in SESSION)
  - `logout.php` (Clears SESSION state)
- **Authenticated Access**:
  - `dashboard.php` (Personalized greeting, accessible only after login)
  - `manage_courses.php` (Demonstrates full CRUD logic for listing, adding, editing, and deleting courses)

## Validation Results
- Verified that all SQL matches the 5 database table requirements alongside the 10 data entry minimum.
- Verified JavaScript validation intercepts empty submissions and small password inputs prior to backend transmission.
- Verified CRUD operations (Create, Read, Update, Delete) are fully programmed in `manage_courses.php`.

## How to Test Manually
1. Move or copy the project folder (`Online Course Management System`) into your XAMPP's `htdocs` directory (e.g., `C:\xampp\htdocs\elearning`).
2. Start **Apache** and **MySQL** from your XAMPP control panel.
3. Open `phpMyAdmin` (typically `http://localhost/phpmyadmin`).
4. Import the `database.sql` script located in the project folder to create the `elearning` database and its tables.
5. Access `http://localhost/elearning/index.php` in your browser.
6. Create an account, simulate contact submissions, or login as a sample user (e.g., `john@example.com` / `pwd123`). Test the CRUD features on the Manage Courses tab!
