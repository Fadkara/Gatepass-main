<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = 1; // simulate logged-in user
    $name = $_POST['name'];
    $serial = $_POST['serial'];
    $type = $_POST['type'];

    $stmt = $conn->prepare("INSERT INTO assets (user_id,name, serial, type) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $userId, $name, $serial, $type);

    if ($stmt->execute()) {
        header("Location: asset_management.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>