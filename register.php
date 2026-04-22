<?php include('config/db.php'); ?>
<?php
$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $gender = isset($_POST['gender']) ? $conn->real_escape_string($_POST['gender']) : '';
    $course = isset($_POST['course']) ? $conn->real_escape_string($_POST['course']) : '';
    $interests = isset($_POST['interests']) ? implode(", ", $_POST['interests']) : '';
    $interests = $conn->real_escape_string($interests);

    $sql = "INSERT INTO users (name, email, password, gender, course, interests) VALUES ('$name', '$email', '$password', '$gender', '$course', '$interests')";
    if ($conn->query($sql) === TRUE) {
        $msg = "<div class='alert'>Registration successful! <a href='login.php'>Login here</a>.</div>";
    } else {
        $msg = "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | E-Learning</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/validation.js" defer></script>
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
        <h1 style="text-align: center; margin-bottom: 2rem;">Create an Account</h1>

        <?php if($msg != "") echo $msg; ?>

        <form name="registerForm" method="POST" action="register.php" onsubmit="return validateRegisterForm()" autocomplete="off">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            
            <div class="form-group">
                <label>Gender</label>
                <input type="radio" name="gender" value="Male" id="male"><label for="male" style="display:inline;font-weight:normal;">Male</label>
                <input type="radio" name="gender" value="Female" id="female"><label for="female" style="display:inline;font-weight:normal;">Female</label>
            </div>

            <div class="form-group">
                <label for="course">Preferred Course</label>
                <select name="course" id="course">
                    <option value="">--Select a Course--</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Data Science">Data Science</option>
                    <option value="UX Design">UX Design</option>
                </select>
            </div>

            <div class="form-group">
                <label>Interests</label>
                <input type="checkbox" name="interests[]" value="Coding" id="coding"><label for="coding" style="display:inline;font-weight:normal;">Coding</label>
                <input type="checkbox" name="interests[]" value="Design" id="design"><label for="design" style="display:inline;font-weight:normal;">Design</label>
                <input type="checkbox" name="interests[]" value="Marketing" id="marketing"><label for="marketing" style="display:inline;font-weight:normal;">Marketing</label>
            </div>

            <button type="submit" name="submit" class="btn" style="width: 100%;">Register</button>
        </form>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> E-Learning Platform. All rights reserved.</p>
    </footer>
</body>
</html>
