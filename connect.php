<?php
$db_username = "test";
$db_password = "123456@mysql";
        // Tạo kết nối đến cơ sở dữ liệu sử dụng MySQLi
        $connect = new mysqli("localhost", $db_username,$db_password ,"pentest" );

        // Kiểm tra kết nối
        if ($connect->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }
?>