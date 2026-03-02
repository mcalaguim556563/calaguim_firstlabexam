<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../index.php");
  exit;
}

include "../db.php";

$id = $_GET['id'];
$message = "";

$get = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$student = mysqli_fetch_assoc($get);

if (!$student) {
  header("Location: home.php");
  exit;
}

if (isset($_POST['update'])) {
  $id_number = $_POST['id_number'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $course = $_POST['course'];

  if ($id_number == "" || $name == "" || $email == "" || $course == "") {
    $message = "All fields are required";
  } else {
    mysqli_query($conn, "UPDATE students SET
      id_number='$id_number',
      name='$name',
      email='$email',
      course='$course'
      WHERE id=$id");
    header("Location: home.php");
    exit;
  }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Edit Student</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="wrap">
  <div class="box">
    <div class="topbar">
      <h1>Edit Student Record</h1>
      <a href="home.php">Back</a>
    </div>

    <p class="msg"><?php echo $message; ?></p>

    <form method="post">
      <label>ID Number</label>
      <input type="text" name="id_number" value="<?php echo $student['id_number']; ?>" required>

      <label>Name</label>
      <input type="text" name="name" value="<?php echo $student['name']; ?>" required>

      <label>Email</label>
      <input type="email" name="email" value="<?php echo $student['email']; ?>" required>

      <label>Course</label>
      <input type="text" name="course" value="<?php echo $student['course']; ?>" required>

      <p style="margin-top:16px;">
        <button type="submit" name="update">Save</button>
        <a href="home.php" style="margin-left:12px;">Cancel</a>
      </p>
    </form>
  </div>
</div>
</body>
</html>