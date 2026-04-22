<?php include('config/db.php'); ?>
<?php
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users | E-Learning</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="logo"><h2>E-Learning Platform</h2></div>
        <nav>
            <a href="index.php">Home</a>
            <a href="dashboard.php">Dashboard</a>
            <a href="manage_courses.php">Manage Courses</a>
            <a href="manage_users.php">Manage Users</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <div class="container">
        <h1 style="margin-bottom: 2rem; text-align: center;">Registered Users</h1>

        <div style="overflow-x:auto;">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Gender</th>
                    <th>Course Interest</th>
                    <th>Interests</th>
                </tr>
                <?php
                $sql_list = "SELECT * FROM users ORDER BY id DESC";
                $result_list = $conn->query($sql_list);
                if($result_list && $result_list->num_rows > 0) {
                    while($row = $result_list->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['password']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['course']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['interests']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No users found.</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> E-Learning Platform. All rights reserved.</p>
    </footer>
</body>
</html>
