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
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Insert user data into the login table
    $sql1 = "INSERT INTO contact (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)";
    $stmt1 = $conn->prepare($sql1);
    
    // Check if the prepare statement was successful
    if ($stmt1) {
        $stmt1->bind_param("sssss", $name, $email, $phone, $subject, $message);
        if ($stmt1->execute()) {
            // User data successfully inserted into the login table
            header("Location: contact.html");
            exit();
        } else {
            echo "Error: " . $stmt1->error;
        }
        $stmt1->close();
    } else {
        echo "Error: " . $conn->error;
    }
    
}

$conn->close();
?>
