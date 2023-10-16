<?php
include 'dbConnect.php';
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $userName = $_POST['userName'];
  $password = $_POST['password'];
  // Check if user exists or not
  $sql      = "Select * from `signindata` where username='$userName'";
  $result   = mysqli_query($conn, $sql);
  $num      = mysqli_num_rows($result);
  if ($num == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
      if (password_verify($password, $row['pass'])) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['show'] = true;
        header("location: index.php");
      } else {
        $msg = "Check your password or username";
      }
    }
  } else {
    $msg = "Check your password or username";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="loginStyle.css" />
  <title>Login</title>
</head>

<body class="logIn">
  <div class="container">
    <?php
    if (isset($msg)) {
      echo '<h3 style="color:red">' . $msg . '</h3>';
      unset($msg);
    } else {
      echo '<h1>Login</h1>';
    }
    ?>
    <form action="./login.php" method="POST">
      <div class="inDiv">
        <label for="userName" class="userLabel">Username:</label>
        <input type="text" class="user" id="userName" name="userName" required />
      </div>
      <div class="inDiv">
        <label for="password" class="passLabel">Password:</label>
        <input type="password" class="pass" id="password" name="password" required />
      </div>
      <p class="newUser">
        New user ?
        <a class="new" href="./signin.php">Signin here</a>
      </p>
      <button type="submit" class="btn">Login</button>
    </form>
  </div>
</body>

</html>
