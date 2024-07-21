<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
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
        <h1>Add Students</h1>
        <form action="add.php" method="post">
        <div class="form-group">
            <label for="hoten">Name</label>
            <input type="text" id="hoten" name="hoten" class="form-control" required></div>
        <div class="form-group">
            <label for="lop">Class</label>
            <input type="text" id="lop" name="lop" class="form-control" required></div>
        <button class="btn btn-success" name= "add">Add Student</button>
        </form>
    </div>
</body>
</html>

<?php
// Kết nối db
require_once 'connect.php';
if (isset($_POST['add'])){
    $name = $_POST['hoten'];
    $class = $_POST['lop'];
    // Truy vấn SQL
    $query = "INSERT INTO students (name,class) VALUES ('$name','$class')";
    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
        if (!$result) {
            echo "Lỗi truy vấn SQL: " . mysqli_error($connect);
        } else {
            echo '<script language="javascript">alert("Add Success!!"); window.location = "add.php";</script>';
    }    
}




