<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../index.php");
  exit;
}

include "../db.php";

$message = "";

if (isset($_POST['save'])) {
  $id_number = $_POST['id_number'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $course = $_POST['course'];

  if ($id_number == "" || $name == "" || $email == "" || $course == "") {
    $message = "All fields are required";
  } else {
    mysqli_query($conn, "INSERT INTO students (id_number, name, email, course)
      VALUES ('$id_number', '$name', '$email', '$course')");
    header("Location: home.php");
    exit;
  }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Create Student</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="wrap">
  <div class="box">
    <div class="topbar">
      <h1>Create Student Record</h1>
      <a href="home.php">Back</a>
    </div>

    <p class="msg"><?php echo $message; ?></p>

    <form method="post">
      <label>ID Number</label>
      <input type="text" name="id_number" required>

      <label>Name</label>
      <input type="text" name="name" required>

      <label>Email</label>
      <input type="email" name="email" required>

      <label>Course</label>
      <input type="text" name="course" required>

      <p style="margin-top:16px;">
        <button type="submit" name="save">Add Student</button>
        <a href="home.php" style="margin-left:12px;">Cancel</a>
      </p>
    </form>
  </div>
</div>
</body>
</html>