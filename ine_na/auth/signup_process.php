<?php
include "../config/db_connect.php";

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email    = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // secure hashing
    $role     = $_POST['role'];

    // CHECK if username OR email already exists
    $check = $conn->query("SELECT * FROM modules WHERE email='$email' OR username='$username'");

    if ($check->num_rows > 0) {
        echo "<script>alert('Email or Username already taken!'); window.location='signup.php';</script>";
        exit;
    }

    // INSERT user
    $sql = "INSERT INTO modules (fullname, email, username, password, role)
            VALUES ('$fullname', '$email', '$username', '$password', '$role')";

    if ($conn->query($sql)) {
        echo "<script>alert('Account created successfully!'); window.location='login.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
