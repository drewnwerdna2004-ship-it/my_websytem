<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../../config/db_connect.php";

if (isset($_POST['save'])) {

    // Sanitize input
    $student_number = $conn->real_escape_string($_POST['student_number']);
    $first_name     = $conn->real_escape_string($_POST['first_name']);
    $last_name      = $conn->real_escape_string($_POST['last_name']);
    $middle_name    = $conn->real_escape_string($_POST['middle_name']);
    $sex            = $conn->real_escape_string($_POST['sex']);
    $birthdate      = $conn->real_escape_string($_POST['birthdate']);
    $address        = $conn->real_escape_string($_POST['address']);
    $contact_number = $conn->real_escape_string($_POST['contact_number']);
    $email          = $conn->real_escape_string($_POST['email']);

    // Get course_id from POST and make sure it's integer
    $course_id = intval($_POST['course_id']); 

    // Insert query with course_id
    $sql = "INSERT INTO students 
            (student_number, course_id, first_name, last_name, middle_name, sex, birthdate, address, contact_number, email)
            VALUES 
            ('$student_number', $course_id, '$first_name', '$last_name', '$middle_name', '$sex', '$birthdate', '$address', '$contact_number', '$email')";

    if ($conn->query($sql)) {
        echo "<script>alert('Student Added Successfully!'); window.location='student_management.php';</script>";
        exit;
    } else {
        echo "<h3>SQL Error:</h3>" . $conn->error;
        exit;
    }

} else {
    echo "Invalid Access!";
    exit;
}
?>
