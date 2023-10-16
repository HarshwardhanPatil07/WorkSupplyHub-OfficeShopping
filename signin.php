<?php
include 'dbConnect.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $userName  = $_POST['userName'];
  $password  = $_POST['password'];
  $userMail  = $_POST['userMail'];
  $cpassword = $_POST['cpassword'];

  // Check if passwords match
  if ($password == $cpassword) {
    // Check if the user already exists
    $checkRept  = "SELECT `mail` from `signindata` WHERE mail = '$userMail'";
    $checkReslt = mysqli_query($conn, $checkRept);

    if ($checkReslt && mysqli_num_rows($checkReslt) > 0) {
      // User already exists
      $msg = "User already exists";
    } else {
      $hash  = password_hash($password, PASSWORD_DEFAULT);
      $query = $conn->prepare("INSERT INTO `signindata` (`mail`, `userName`, `pass`) VALUES (?, ?, ?)");
      $query->bind_param("sss", $userMail, $userName, $hash);
      $result = $query->execute();

      if ($result) {
        // Successfully registered
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['show'] = true;
        header("location:index.php");
        exit;
      } else {
        $msg = "Not Successful";
      }
    }
  } else {
    $msg = "Password did not matched.";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="loginStyle.css" />
  <title>Signin</title>
</head>

<body class="signIn">
  <div class="container">

    <?php
    if (isset($msg)) {
      echo '<h2 style="color:red">' . $msg . '</h2>';
      unset($msg);
    } else {
      echo '<h1>Signin</h1>';
    }
    ?>

    <form action="./signin.php" method="POST">
      <div class="inDiv">
        <label for="userMail" class="mailLabel">Email:</label>
        <input type="email" class="user" id="userMail" name="userMail" required />
      </div>
      <div class="inDiv">
        <label for="userName" class="userLabel">Username:</label>
        <input type="text" class="user" id="userName" name="userName" required />
      </div>
      <div class="inDiv">
        <label for="password" class="passLabel">Password:</label>
        <input type="password" class="pass" id="password" name="password" required />
      </div>
      <div class="inDiv">
        <label for="cpassword" class="passLabel">Confirm Password:</label>
        <input type="password" class="pass" id="cpassword" name="cpassword" required />
      </div>
      <button type="submit" class="btn">Signin</button>
    </form>
  </div>
</body>

</html>