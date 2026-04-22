<?php include('config/db.php'); ?>
<?php
if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
// Get user ID
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | E-Learning</title>
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
            <a href="dashboard.php">Dashboard</a>
            <?php if(isset($_SESSION['admin_logged_in'])): ?>
                <a href="manage_courses.php">Manage Courses</a>
                <a href="manage_users.php">Manage Users</a>
            <?php endif; ?>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <div class="container">
        <h1 style="margin-bottom: 2rem;">Welcome, <?php echo htmlspecialchars($_SESSION['user_name'] ?? $_SESSION['user']); ?>!</h1>
        
        <?php 
        if(isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>

        <div class="card-grid">
            <div class="card">
                <h3>My Profile</h3>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['user']); ?></p>
                <p><strong>Role:</strong> Student</p>
                <br>
                <a href="#" class="btn btn-outline">Edit Profile</a>
            </div>
            
            <div class="card" style="grid-column: span 2;">
                <h3>My Enrollments</h3>
                <?php
                $sql_enroll = "SELECT c.course_name, c.description, c.course_id FROM enrollments e JOIN courses c ON e.course_id = c.course_id WHERE e.user_id = '$user_id'";
                $res_enroll = $conn->query($sql_enroll);
                
                if($res_enroll && $res_enroll->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>Course Name</th><th>Description</th></tr>";
                    while($row = $res_enroll->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><strong>" . htmlspecialchars($row['course_name']) . "</strong></td>";
                        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p style='margin-top:1rem;'>You have not enrolled in any courses yet.</p>";
                    echo "<a href='courses.php' class='btn' style='margin-top:1rem; width: auto;'>Browse Courses</a>";
                }
                ?>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> E-Learning Platform. All rights reserved.</p>
    </footer>
</body>
</html>
