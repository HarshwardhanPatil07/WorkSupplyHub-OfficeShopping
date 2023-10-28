<?php
// Database configuration
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "login";

// Create a database connection
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    // $college = $_POST["college"];
    // $cgpa = $_POST["cgpa"];
    $phone = $_POST["phone"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    // $internship = $_POST["internship"];
    // $linkedin = $_POST["linkedin"];
    // $skills = $_POST["skills"];
    
    // File upload handling
    // $targetDirectory = dirname(_FILE_) . '/uploads/';
    // // $targetDirectory = "uploads/"; // Create a directory for file uploads
    // $targetFile = $targetDirectory . basename($_FILES["resume"]["name"]);
    // $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
    // if (move_uploaded_file($_FILES["resume"]["tmp_name"], $targetFile)) {
        // Read the resume file content into a variable
        // $resumeData = file_get_contents($targetFile);

        // Insert data into the database with resume binary data
        $sql = "INSERT INTO contact (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);

        if ($stmt->execute()) {
            // Data insertion successful, you can redirect to a success page
            header("Location: contact.html");
            exit();
        } else {
            // Data insertion failed, display an error message
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error uploading file.";
    }

// Close the database connection
$conn->close();
?>