<?php
// Replace these with your database credentials
$host = "localhost";
$username = "root";
$password = "";
$database = "facebook";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input from the form
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Insert user data into the database
$query = "INSERT INTO profile (first_name, last_name, email, phone) VALUES ('$first_name', '$last_name', '$email', '$phone')";

if ($conn->query($query) === TRUE) {
    echo "User registered successfully!";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>
