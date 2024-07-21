<?php
session_start(); // Khởi tạo phiên

// Xóa tất cả các biến phiên
session_unset();

// Hủy phiên
session_destroy();

// Chuyển hướng người dùng về trang đăng nhập
header("Location: login.php");
exit(); // Dừng thực thi mã PHP tiếp theo
?>
