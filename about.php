<?php include('config/db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | E-Learning</title>
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
        <h1 style="text-align: center; margin-bottom: 2rem;">About Us</h1>
        <div class="card" style="max-width: 800px; margin: 0 auto;">
            <h2>Our Mission</h2>
            <p style="margin-top: 1rem; line-height: 1.6;">We strive to provide accessible, high-quality education to learners all around the globe. Our platform connects expert instructors with passionate students to foster an environment of continuous growth and development.</p>
            <br>
            <h2>Why Choose Us?</h2>
            <ul style="margin-left: 1.5rem; margin-top: 1rem; line-height: 1.6;">
                <li>Expert-led courses in diverse fields.</li>
                <li>Flexible learning from anywhere at any time.</li>
                <li>Interactive and engaging materials.</li>
            </ul>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> E-Learning Platform. All rights reserved.</p>
    </footer>
</body>
</html>
