# Online Course Management System

A web-based E-Learning Platform built with PHP, MySQL, HTML, CSS, and JavaScript. 
This project allows students to register, log in, browse courses, and enroll. It also includes an Admin panel to manage courses and view registered users.

## Features
- **Student Portal**: Register, Login, View Profile, Browse Courses, View Enrollments.
- **Admin Portal**: Secure Admin Login, Manage (Add/Edit/Delete) Courses, View all Registered Users.
- **Responsive Design**: Custom CSS for a modern, responsive UI.
- **Database Integration**: Full CRUD operations using MySQL.

## Requirements
- XAMPP, WAMP, or any other local server environment with PHP and MySQL.

## Installation & Setup Instructions (For Lecturers / Evaluators)

Follow these steps to run the project on any laptop:

1. **Download the Project**
   - Clone or download the ZIP from this GitHub repository.
   - Extract the folder and rename it to `elearning` (or keep the original name, e.g., `Online Course Management System`).

2. **Move to Local Server**
   - Copy the entire project folder and paste it inside your server's root directory:
     - For **XAMPP**: `C:\xampp\htdocs\`
     - For **WAMP**: `C:\wamp\www\`

3. **Start Apache & MySQL**
   - Open your XAMPP/WAMP Control Panel.
   - Start the **Apache** and **MySQL** modules.

4. **Database Setup**
   - Open your web browser and go to `http://localhost/phpmyadmin`
   - You do **NOT** need to create a database manually! 
   - Click on the **Import** tab at the top.
   - Click **Choose File** and select the `database.sql` file located inside the project folder.
   - Click **Import** at the bottom. This will automatically create the `elearning` database and insert all the required tables and sample data.

5. **Run the Website**
   - Open your browser and go to:
     `http://localhost/elearning`  *(or whatever you named the folder in step 1)*

## Testing Credentials

**Admin Login (`admin_login.php`)**
- **Username:** `admin`
- **Password:** `admin123`

**Student Login (`login.php`)**
- **Email:** `john@example.com`
- **Password:** `pwd123`
*(Or you can register a new student account via the Register page)*

## Project Structure
- `index.php` - Homepage
- `login.php` / `register.php` - Student Authentication
- `admin_login.php` - Admin Authentication
- `dashboard.php` - Student/Admin Dashboard
- `courses.php` - Browse Courses
- `manage_courses.php` - Admin page for CRUD operations on courses
- `manage_users.php` - Admin page to view registered users
- `config/db.php` - Database connection settings
- `database.sql` - Complete database schema with dummy data
