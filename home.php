<?php
session_start(); // Khởi tạo session

if (!isset($_SESSION['username'])) {
    // Nếu không có người dùng trong session, chuyển hướng về trang đăng nhập
    header("Location: login.php");
    exit();
}

// Lấy tên người dùng từ session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
    <p>This is your home page.</p><br>
    <a href="logout.php">Logout</a>
</body>
</html>
