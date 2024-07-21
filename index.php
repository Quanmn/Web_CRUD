
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
    <form action="index.php" method="POST">
  <div class="form-group">
    <label for="username"><b>Username:</b></label>
    <input type="text" class="form-control" placeholder="Enter username" id="username" name="username">
  </div>
  <div class="form-group">
    <label for="pwd"><b>Password:</b></label>
    <input type="password" class="form-control" name="password" placeholder="Enter password" id="pwd">
  </div>
  <button type="submit" class="btn btn-primary" name="Login">Login</button>
  <a href="register.php" class="btn btn-success">Register</a>
</form>
    </div> 
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
            echo '<script language="javascript">alert("Tên đăng nhập không tồn tại."); window.location = "index.php";</script>';
        } else if ($password != $row['password']) {
            echo '<script language="javascript">alert("Mật khẩu không đúng. Vui lòng nhập lại."); window.location = "index.php";</script>';
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