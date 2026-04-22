<?php include('config/db.php'); ?>
<?php
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

$msg = "";
$action = isset($_GET['action']) ? $_GET['action'] : '';
$edit_id = isset($_GET['id']) ? $_GET['id'] : '';

// Handle Delete
if($action == 'delete' && !empty($edit_id)) {
    $edit_id = $conn->real_escape_string($edit_id);
    $sql_del = "DELETE FROM courses WHERE course_id='$edit_id'";
    if($conn->query($sql_del) === TRUE) {
        $msg = "<div class='alert'>Course deleted successfully.</div>";
    }
}

// Handle Add/Edit Form Submission
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_course'])) {
    $course_name = $conn->real_escape_string($_POST['course_name']);
    $description = $conn->real_escape_string($_POST['description']);
    $course_id = isset($_POST['course_id']) ? $conn->real_escape_string($_POST['course_id']) : '';

    if(empty($course_id)) {
        // Create
        $sql_add = "INSERT INTO courses (course_name, description) VALUES ('$course_name', '$description')";
        if($conn->query($sql_add) === TRUE) {
            $msg = "<div class='alert'>Course added successfully.</div>";
        } else {
            $msg = "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
        }
    } else {
        // Update
        $sql_edit = "UPDATE courses SET course_name='$course_name', description='$description' WHERE course_id='$course_id'";
        if($conn->query($sql_edit) === TRUE) {
            $msg = "<div class='alert'>Course updated successfully.</div>";
            $action = ''; // reset edit mode
        } else {
            $msg = "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
        }
    }
}

// Fetch course for editing
$edit_cname = "";
$edit_cdesc = "";
if($action == 'edit' && !empty($edit_id)) {
    $sql_fetch = "SELECT * FROM courses WHERE course_id='$edit_id'";
    $res_fetch = $conn->query($sql_fetch);
    if($res_fetch && $res_fetch->num_rows > 0) {
        $c = $res_fetch->fetch_assoc();
        $edit_cname = $c['course_name'];
        $edit_cdesc = $c['description'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Courses | E-Learning</title>
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
        <h1 style="margin-bottom: 2rem; text-align: center;">Manage Courses</h1>
        
        <?php if($msg != "") echo $msg; ?>

        <div class="card" style="max-width: 800px; margin: 0 auto 2rem auto;">
            <h2><?php echo ($action == 'edit') ? 'Edit Course' : 'Add New Course'; ?></h2>
            <br>
            <form method="POST" action="manage_courses.php" style="box-shadow: none; padding: 0; max-width: 100%; background: transparent; border: none;">
                <input type="hidden" name="course_id" value="<?php echo htmlspecialchars($action == 'edit' ? $edit_id : ''); ?>">
                <div class="form-group">
                    <label for="course_name">Course Name</label>
                    <input type="text" id="course_name" name="course_name" value="<?php echo htmlspecialchars($edit_cname); ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="3" required><?php echo htmlspecialchars($edit_cdesc); ?></textarea>
                </div>
                <button type="submit" name="save_course" class="btn"><?php echo ($action == 'edit') ? 'Update Course' : 'Save Course'; ?></button>
                <?php if($action == 'edit'): ?>
                    <a href="manage_courses.php" class="btn" style="background:#6c757d;">Cancel</a>
                <?php endif; ?>
            </form>
        </div>

        <h2>Course List</h2>
        <div style="overflow-x:auto;">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Course Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                <?php
                $sql_list = "SELECT * FROM courses ORDER BY course_id DESC";
                $result_list = $conn->query($sql_list);
                if($result_list && $result_list->num_rows > 0) {
                    while($row = $result_list->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['course_id'] . "</td>";
                        echo "<td>" . htmlspecialchars($row['course_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                        echo "<td>";
                        echo "<a href='manage_courses.php?action=edit&id=" . $row['course_id'] . "' class='btn' style='padding:0.4rem 0.8rem; font-size: 0.9rem;'>Edit</a> ";
                        echo "<a href='manage_courses.php?action=delete&id=" . $row['course_id'] . "' class='btn btn-danger' style='padding:0.4rem 0.8rem; font-size: 0.9rem;' onclick='return confirm(\"Are you sure you want to delete this course?\")'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No courses found.</td></tr>";
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
