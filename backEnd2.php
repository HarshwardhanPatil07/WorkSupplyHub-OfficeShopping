<?php
include 'dbConnect.php';
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $userName=$_POST['userName'];
    $password=$_POST['password'];
    $sql = "Select * from `signindata` where username='$userName'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['pass'])) {
                header("location: index.html");
            } else {
                header("location: error.html");
            }
        }
    }else{
        header("location: error.html");
    }
}
?>