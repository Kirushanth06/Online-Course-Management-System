<?php include('config/db.php'); ?>
<?php
if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if(isset($_GET['id'])) {
    $course_id = $conn->real_escape_string($_GET['id']);
    $user_id = $_SESSION['user_id'];

    // Check if course exists
    $check_course = $conn->query("SELECT * FROM courses WHERE course_id='$course_id'");
    if($check_course->num_rows > 0) {
        
        // Check if already enrolled
        $check_enrollment = $conn->query("SELECT * FROM enrollments WHERE user_id='$user_id' AND course_id='$course_id'");
        if($check_enrollment->num_rows > 0) {
            $_SESSION['msg'] = "<div class='alert alert-danger'>You are already enrolled in this course.</div>";
        } else {
            // Enroll
            $sql = "INSERT INTO enrollments (user_id, course_id) VALUES ('$user_id', '$course_id')";
            if($conn->query($sql) === TRUE) {
                $_SESSION['msg'] = "<div class='alert'>Successfully enrolled in the course!</div>";
            } else {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Error enrolling: " . $conn->error . "</div>";
            }
        }
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger'>Course not found.</div>";
    }
}
header("Location: dashboard.php");
exit();
?>
