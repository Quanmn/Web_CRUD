<?php
require_once 'connect.php';
$uid =$_GET['uid'];
echo $uid;
$edit_sql = "SELECT * FROM students WHERE id=$uid";
$result = mysqli_query($connect, $edit_sql) or die(mysqli_error($connect));
$row = mysqli_fetch_assoc($result);
if (!$result) {
    echo "Lỗi truy vấn SQL: " . mysqli_error($connect);
} else {
    echo '<script language="javascript">alert("Edit Success!!"); window.location = "dashbroad.php";</script>';
}    

//edit form
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
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
        <h1>Edit Students</h1>
        <form action="update.php" method="post">
        <input type="hidden" name="uid" value="<?php echo $uid;?>"id="">
        <div class="form-group">
            <label for="hoten">Name</label>
            <input type="text" id="hoten" name="hoten" value="<?php echo $row['name']?>" class="form-control" required></div>
        <div class="form-group">
            <label for="lop">Class</label>
            <input type="text" id="lop" name="lop" value="<?php echo $row['class']?>" class="form-control" required></div>
        <button class="btn btn-success" name= "add">Update Student</button>
        </form>
    </div>
</body>
</html>
