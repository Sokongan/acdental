<?php
require_once __DIR__ . '/config/bootstrap.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM user WHERE username = ? LIMIT 1");
    $stmt->execute([$username]);
    $row = $stmt->fetch();

    if ($row && $password === $row['password']) {
        $_SESSION['username'] = $username;
        session_regenerate_id(true);
        header("Location: home.php");
        exit();
    } else {
        echo "<script>alert('Invalid username or password.'); window.location.href='login.php';</script>";
    }
}
