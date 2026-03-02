<?php
session_start();

if (isset($_SESSION['username'])) {
  header("Location: views/home.php");
  exit;
}

$error = "";

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if ($username === "admin" && $password === "admin123") {
    $_SESSION['username'] = "ADMIN";
    header("Location: views/home.php");
    exit;
  } else {
    $error = "Invalid username or password";
  }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrap">
  <div class="box">
    <div class="center">
      <h2>Login</h2>
      <p class="muted">Student Records</p>
    </div>

    <p class="msg center"><?php echo $error; ?></p>

    <form method="post">
      <label>Username</label>
      <input type="text" name="username" required>

      <label>Password</label>
      <input type="password" name="password" required>

      <p class="center" style="margin-top:16px;">
        <button type="submit" name="login">Login</button>
      </p>
    </form>
  </div>
</div>
</body>
</html>