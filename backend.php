<?php
include 'dbConnect.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $userName  = $_POST['userName'];
    $password  = $_POST['password'];
    $userMail  = $_POST['userMail'];
    $cpassword = $_POST['cpassword'];
        if ($password == $cpassword) {
            $checkRept = "SELECT `mail` from `signindata` WHERE mail = '$userMail'";
            $checkReslt = mysqli_query($conn,$checkRept);
            if($checkReslt){
                echo "";
                header("location:signin.html");
                exit;
            }else{
                $hash  = password_hash($password, PASSWORD_DEFAULT);
                $query = $conn->prepare("INSERT INTO `signindata` (`mail`, `userName`, `pass`) VALUES (?, ?, ?)");
                $query->bind_param("sss", $userMail, $userName, $hash);
                $result = $query->execute();
                if ($result) {
                    header("location:index.html");
                    exit;
                } else {
                    echo "Not Successful";
                    header("location:index.html");
                    exit;
                }
            }
        } else {
            echo "Passwords did not matched.";
            header("location:index.html");
            exit;
        }    
} else {
    echo "Not Successful";
    header("location:index.html");
    exit;
}
?>