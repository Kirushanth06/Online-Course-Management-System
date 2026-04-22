<?php include('config/db.php'); ?>
<?php
$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $admin['username'];
        $_SESSION['user'] = $admin['username']; // For compatibility with nav links
        $_SESSION['user_id'] = 0; // Admin user ID
        $_SESSION['user_name'] = "Admin (" . $admin['username'] . ")";
        header("Location: dashboard.php");
        exit();
    } else {
        $msg = "<div class='alert alert-danger'>Login Failed: Invalid Admin credentials.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | E-Learning</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="logo"><h2>E-Learning Platform</h2></div>
        <nav>
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="courses.php">Courses</a>
            <a href="contact.php">Contact</a>
            <?php if(isset($_SESSION['user'])): ?>
                <a href="dashboard.php">Dashboard</a>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            <?php endif; ?>
        </nav>
    </header>

    <div class="container">
        <h1 style="text-align: center; margin-bottom: 2rem;">Admin Secure Access</h1>

        <?php if($msg != "") echo $msg; ?>

        <form name="adminLoginForm" method="POST" action="admin_login.php" autocomplete="off">
            <div class="form-group">
                <label for="username">Admin Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" name="submit" class="btn" style="width: 100%;">Enter Admin Portal</button>
            <p style="text-align: center; margin-top: 1rem;"><a href="login.php" style="color:var(--text-secondary);">Back to Student Login</a></p>
        </form>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> E-Learning Platform. All rights reserved.</p>
    </footer>
</body>
</html>
