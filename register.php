<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <form method="POST" action="register.php" class="register">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Register" name="register">
    </form>
</body>
</html>
<?php
// Kết nối cơ sở dữ liệu
include('connect.php');
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra xem tên người dùng đã tồn tại chưa
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo '<script language="javascript">alert("Error: This Username is already taken. Please choose another name."); window.location = "register.php";</script>';
    } else {
        // Mã hóa mật khẩu
        $password = sha1($password);

        // Thực hiện câu lệnh chèn
        $sql = "INSERT INTO users (username, password) VALUES ('$username','$password')";
        if (mysqli_query($connect, $sql)) {
            echo '<script language="javascript">alert("Đăng ký thành công"); window.location = "register.php";</script>';
        } 
    }
}
?>
