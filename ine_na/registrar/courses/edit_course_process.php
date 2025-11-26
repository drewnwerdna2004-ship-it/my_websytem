<?php
include "../../config/db_connect.php";

if(isset($_POST['update'])){
    $course_id   = intval($_POST['course_id']);
    $course_code = $conn->real_escape_string($_POST['course_code']);
    $course_name = $conn->real_escape_string($_POST['course_name']);
    $description = $conn->real_escape_string($_POST['description']);

    $sql = "UPDATE courses SET 
            course_code='$course_code', 
            course_name='$course_name', 
            description='$description' 
            WHERE course_id=$course_id";

    if($conn->query($sql)){
        echo "<script>alert('Course updated successfully'); window.location='course_management.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
