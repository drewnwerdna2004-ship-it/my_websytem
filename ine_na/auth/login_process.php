<?php
session_start();
include "../config/db_connect.php";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $selected_role = $_POST['role']; // USER SELECTED ROLE

    // Select by username or email
    $sql = "SELECT * FROM modules WHERE username='$username' OR email='$username'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {

        $user = $result->fetch_assoc();

                     // STEP 1: Check if selected role matches DB role
        if ($selected_role !== $user['role']) {
            echo "<script>alert('Incorrect role selected! Your registered role is: {$user['role']}'); window.location='login.php';</script>";
            exit;
        }


        // STEP 2: Verify password
        if (password_verify($password, $user['password'])) {

            // STEP 3: Set session
            $_SESSION['id']       = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['role']     = $user['role'];

            // STEP 4: Redirect based on role
            if ($user['role'] == "registrar") {
                header("Location: ../registrar/registrar_dashboard.php");
            }
            else if ($user['role'] == "teacher") {
                header("Location: ../teacher/teacher_dashboard.php");
            }
            else if ($user['role'] == "cashier") {
                header("Location: ../cashier/cashier_dashboard.php");
            }

            exit;
        } 
        else {
            echo "<script>alert('Incorrect password!'); window.location='login.php';</script>";
            exit;
        }

    } 
    else {
        echo "<script>alert('User not found!'); window.location='login.php';</script>";
        exit;
    }
}
?>
