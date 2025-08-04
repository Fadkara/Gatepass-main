<?php
// add_user.php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "gatepass_system";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['fullName'];
$email = $_POST['email'];
$role = $_POST['role'];
$status = $_POST['status'];

$stmt = $conn->prepare("INSERT INTO users (full_name, email, role, status) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $role, $status);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
