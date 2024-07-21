<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbroad</title>
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
        <h1>Dashboard Student 🤖🤖</h1>
        <a href="add.php" class="btn btn-success">Add Student</a> <br>
    <table class="table">
    <thead class="thead-light">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Class</th>
        <th>Handle</th>
      </tr>
    </thead>
    <tbody>
    <?php
        require_once 'connect.php';
        $list_sql = "SELECT * FROM students order by class, name, id";
        $result = mysqli_query($connect, $list_sql);
        while ($r = mysqli_fetch_assoc($result)) {
            # code...
            ?>
            <tr>
            <td><?php echo $r['id'];?></td>
            <td><?php echo $r['name'];?></td>
            <td><?php echo $r['class'];?></td>
            <td><a href="edit.php?uid=<?php echo $r['id'];?>" class="btn btn-info">Edit</a>
            <a onclick="return confirm('Are you sure you want to delete ?');" href="delete.php?sid=<?php echo $r['id'];?>" class="btn btn-danger">Delete</a></td>
          </tr>
<?php
        }
?>
    </tbody>
  </table>
    </div>
</body>
</html>
