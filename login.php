<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Login-Sallaty</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>
<?php
session_start();

//connect to the database
require_once 'includes/db_connect.php';

if (isset($_POST['loginUser']) && isset($_POST['loginPassword'])) {
  //retrieve user information from the database
  $query = "SELECT * FROM admin WHERE email='" . $_POST['loginUser'] . "' AND Password='" . $_POST['loginPassword'] . "'";
  $result = mysqli_query($conn, $query);

  //if a match is found, set a session variable to indicate that the user is logged in
  if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $user['username'];
    header("Location: Administrator.php");
  } else {
    echo "<script>alert('Invalid username or password');</script>";
  }
}

mysqli_close($conn);
?>

<body>

<?php require_once 'includes/header.php'; ?>
  <div class="account">
    <form action="login.php" method="post" class="form">
      <h2>Login</h2>
      <label for="loginUser">Username</label>
      <div class="input-group">
        <input type="text" name="loginUser" id="loginUser" placeholder="Username" required>
      </div>
      <label for="loginPassword">Password</label>
      <div class="input-group">
        <input type="password" name="loginPassword" id="loginPassword" placeholder="Password" required>
      </div>
      <input type="submit" value="Login" class="submit-btn">
    </form>
  </div>
  <?php include 'includes/stickyHeader.php'; ?>

</body>

</html>