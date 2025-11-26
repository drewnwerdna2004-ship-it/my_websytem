<?php
session_start();

// Check if user is logged in and is registrar
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'registrar') {
    header('Location: ../../auth/login.php'); // redirect to login if unauthorized
    exit;
}

// Include database configuration
require_once "../../config/db_connect.php";

// Check if student_id is provided via GET
if (!isset($_GET['id'])) {
    echo "<script>alert('Student ID is required'); window.location='list.php';</script>";
    exit;
}

$student_id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
if ($student_id === false || $student_id <= 0) {
    echo "<script>alert('Invalid student ID'); window.location='list.php';</script>";
    exit;
}

try {
    // Start transaction
    $conn->begin_transaction();

    // Delete related records if any (e.g., enrollments)
    // $stmtEnroll = $conn->prepare("DELETE FROM enrollments WHERE student_id = ?");
    // $stmtEnroll->bind_param("i", $student_id);
    // $stmtEnroll->execute();
    // $stmtEnroll->close();

    // Delete the student
    $stmt = $conn->prepare("DELETE FROM students WHERE student_id = ?");
    $stmt->bind_param("i", $student_id);

    if (!$stmt->execute()) {
        throw new Exception("Failed to delete student: " . $stmt->error);
    }

    if ($stmt->affected_rows === 0) {
        throw new Exception("No student found with the specified ID");
    }

    // Commit transaction
    $conn->commit();

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Success message and redirect to student management (list.php)
    echo "<script>
            alert('Student has been successfully deleted.');
            window.location='student_management.php';
          </script>";
    exit;

} catch (Exception $e) {
    $conn->rollback();
    if (isset($stmt)) $stmt->close();
    $conn->close();
    echo "<script>
            alert('Error: " . $e->getMessage() . "');
            window.location='list.php';
          </script>";
    exit;
}
?>
