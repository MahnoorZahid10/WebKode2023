<?php

// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate form submission
if (isset($_POST['name'], $_POST['email'], $_POST['contact_number'], $_POST['profession']))
 {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contactNumber = $_POST['contact_number'];
    $profession = $_POST['profession'];

    // Prepare and execute SQL query
    $sql = "INSERT INTO users (name, email, contact_number, profession) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $contactNumber, $profession);

    if ($stmt->execute()) {
       
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $stmt->close();
} else {
    echo "";
}

$conn->close();
?>

