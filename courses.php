<?php include('config/db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses | E-Learning</title>
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
        <h1 style="text-align: center; margin-bottom: 2rem;">Available Courses</h1>
        <div class="card-grid">
            <?php
            $sql = "SELECT * FROM courses";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='card'>";
                    echo "<h3>" . htmlspecialchars($row['course_name']) . "</h3>";
                    echo "<p style='margin-top: 1rem;'>" . htmlspecialchars($row['description']) . "</p>";
                    if(isset($_SESSION['user'])) {
                        echo "<br><a href='enroll.php?id=" . $row['course_id'] . "' class='btn'>Enroll Now</a>";
                    } else {
                        echo "<br><a href='login.php' class='btn'>Login to Enroll</a>";
                    }
                    echo "</div>";
                }
            } else {
                echo "<p style='text-align:center;'>No courses available at the moment.</p>";
            }
            ?>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> E-Learning Platform. All rights reserved.</p>
    </footer>
</body>
</html>
