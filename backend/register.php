<?php
session_start();
include 'connection.php';

header('Content-Type: application/json');

$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST['fullname']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($fullname) || empty($email) || empty($password)) {
        echo json_encode([
            "status" => "error",
            "message" => "All fields are required."
        ]);
        exit();
    }

    // Check email
    $stmt = $conn->prepare("SELECT userID FROM users_tbl WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo json_encode([
            "status" => "error",
            "message" => "Email already registered."
        ]);
        exit();
    }
    $stmt->close();

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users_tbl (fullName, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fullname, $email, $hashed_password);

    if ($stmt->execute()) {
        echo json_encode([
            "status" => "success",
            "message" => "Registration successful!"
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Something went wrong."
        ]);
    }

    $stmt->close();
}

$conn->close();
?>