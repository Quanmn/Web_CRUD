<?php
require_once 'connect.php';
$uid =$_GET['uid'];
echo $uid;
$delete_sql = "DELETE FROM students WHERE id=$uid";
$result = mysqli_query($connect, $delete_sql) or die(mysqli_error($connect));
if (!$result) {
    echo "Lỗi truy vấn SQL: " . mysqli_error($connect);
} else {
    echo '<script language="javascript">alert("Delete Success!!"); window.location = "dashbroad.php";</script>';
}    
