<?php
session_start();
include "../../config/db_connect.php";

if(!isset($_GET['id'])) { header("Location:list.php"); exit; }

$course_id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM courses WHERE course_id=$course_id");
$course = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>
    <link rel="stylesheet" href="../../assets/bootstrap.min.css">
</head>
<body class="p-4">
<div class="container">
    <h2>Edit Course</h2>

    <form action="edit_course_process.php" method="POST">
        <input type="hidden" name="course_id" value="<?= $course['course_id']; ?>">
        <div class="mb-3">
            <label>Course Code</label>
            <input type="text" name="course_code" class="form-control" value="<?= $course['course_code']; ?>" required>
        </div>

        <div class="mb-3">
            <label>Course Name</label>
            <input type="text" name="course_name" class="form-control" value="<?= $course['course_name']; ?>" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"><?= $course['description']; ?></textarea>
        </div>

        <button type="submit" name="update" class="btn btn-primary">Update Course</button>
        <a href="course_management.php" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
