<?php
session_start();
include "../../config/db_connect.php";

if (!isset($_POST['student_id'])) {
    header("Location: student_management.php?error=Missing student ID");
    exit();
}

// Sanitize input
$student_id     = (int)$_POST['student_id'];
$student_number = $conn->real_escape_string($_POST['student_number']);
$first_name     = $conn->real_escape_string($_POST['first_name']);
$last_name      = $conn->real_escape_string($_POST['last_name']);
$middle_name    = $conn->real_escape_string($_POST['middle_name']);
$sex            = $conn->real_escape_string($_POST['sex']);
$birthdate      = $conn->real_escape_string($_POST['birthdate']);
$address        = $conn->real_escape_string($_POST['address']);
$contact_number = $conn->real_escape_string($_POST['contact_number']);
$email          = $conn->real_escape_string($_POST['email']);
$status         = $conn->real_escape_string($_POST['status']);
$course_id      = (int)$_POST['course_id'];

// Update query
$sql = "UPDATE students SET
        student_number = '$student_number',
        first_name     = '$first_name',
        last_name      = '$last_name',
        middle_name    = '$middle_name',
        sex            = '$sex',
        birthdate      = '$birthdate',
        address        = '$address',
        contact_number = '$contact_number',
        email          = '$email',
        status         = '$status',
        course_id      = $course_id
        WHERE student_id = $student_id";

if ($conn->query($sql)) {
    header("Location: student_management.php?success=Student updated successfully");
    exit();
} else {
    echo "Error updating student: " . $conn->error;
}
?>
