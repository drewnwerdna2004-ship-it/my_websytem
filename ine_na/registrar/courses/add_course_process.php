<?php
include "../../config/db_connect.php";

if(isset($_POST['save'])){
    $course_code = $conn->real_escape_string($_POST['course_code']);
    $course_name = $conn->real_escape_string($_POST['course_name']);
    $description = $conn->real_escape_string($_POST['description']);

    $sql = "INSERT INTO courses (course_code, course_name, description) 
            VALUES ('$course_code', '$course_name', '$description')";

    if($conn->query($sql)){
        echo "<script>alert('Course added successfully'); window.location='course_management.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
