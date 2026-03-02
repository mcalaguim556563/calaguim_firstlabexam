<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../index.php");
  exit;
}

include "../db.php";
$result = mysqli_query($conn, "SELECT * FROM students ORDER BY id DESC");
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Student Records</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="wrap">
  <div class="box">
    <div class="topbar">
      <h1>Student Records</h1>
      <div>
        <a href="create_student.php">Add Student +</a> |
        <a href="../logout.php">Logout</a>
      </div>
    </div>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <div class="card">
        <h2 style="margin:0 0 8px;"><?php echo $row['name']; ?></h2>
        <div class="muted"><?php echo $row['email']; ?></div>
        <div class="muted"><?php echo $row['id_number']; ?></div>
        <div class="muted"><?php echo $row['course']; ?></div>
        <div class="actions" style="margin-top:12px;">
          <a href="edit_student.php?id=<?php echo $row['id']; ?>">Edit</a>
          <a href="delete_student.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this record?')">Delete</a>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
</body>
</html>