<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "login";

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    if ($password != $confirmPassword) {
        echo "Passwords do not match.";
    } else {
        // Insert user data into the login table
        $sql1 = "INSERT INTO login (username, email, password) VALUES (?, ?, ?)";
        $stmt1 = $conn->prepare($sql1);
        
        // Check if the prepare statement was successful
        if ($stmt1) {
            $stmt1->bind_param("sss", $username, $email, $password);
            if ($stmt1->execute()) {
                // User data successfully inserted into the login table
                header("Location: index.html");
                exit();
            } else {
                echo "Error: " . $stmt1->error;
            }
            $stmt1->close();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$conn->close();
?>
