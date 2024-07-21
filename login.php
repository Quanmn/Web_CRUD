
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="POST" action="login.php" class="Login">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Login" name="Login">
    </form>
</body>
</html>
<?php
session_start(); // Khởi tạo session để lưu thông tin người dùng
include('connect.php');
//Kiểm tra xem user submit chưa
if (isset($_POST['Login'])) {
    # lấy value input
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT username, password FROM users WHERE username = '$username' ";
    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
    if (!$result) {
        echo "Lỗi truy vấn SQL: " . mysqli_error($connect);
    } else {
        $password = sha1($password);
        # Lấy mật khẩu trong db ra
        $row = mysqli_fetch_array($result);
        if (!$row) {
            echo "<br><br>Tên đăng nhập không tồn tại.";
        } else if ($password != $row['password']) {
            echo "<br><br>Mật khẩu không đúng. Vui lòng nhập lại.";
        }else{
            // Đăng nhập thành công
            $_SESSION['username'] = $username; // Lưu tên người dùng vào session
            
            // Chuyển hướng đến trang dashboard.php
            header("Location: dashboard.php");
            exit(); // Dừng thực thi mã PHP tiếp theo
        }
        mysqli_close($connect);
        die();
    }
}
?>