<?php
// Kết nối db
require_once 'connect.php';
if (isset($_POST['add'])){
    $name = $_POST['hoten'];
    $class = $_POST['lop'];
    $id = $_POST['uid'];
    // Truy vấn SQL
    $query = "UPDATE students SET name='$name', class='$class' WHERE id=$id";
    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
        if (!$result) {
            echo "Lỗi truy vấn SQL: " . mysqli_error($connect);
        } else {
            echo '<script language="javascript">alert("Update Success!!"); window.location = "update.php";</script>';
    }    
}
