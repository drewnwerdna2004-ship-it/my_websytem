<?php
include "../../config/db_connect.php";

if(!isset($_GET['id'])) { header("Location:list.php"); exit; }

$course_id = intval($_GET['id']);
$conn->query("DELETE FROM courses WHERE course_id=$course_id");

echo "<script>alert('Course deleted successfully'); window.location='course_management.php';</script>";
?>