<?php
// Replace these with your database credentials
$host ="localhost";
$username = "root";
$password = "";
$database = "facebook";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$email = $_POST['email'];
$password = $_POST['password'];

// Fetch user from database
$query = "SELECT * FROM register WHERE email='$email' AND password='$password'";
$result = $conn->query($query);

// Check if the user exists
if ($result->num_rows > 0) {
    // User authenticated successfullyS
    echo '<script>alert("Login successful!");window.location.href = "integration.html"</script>';
} else {
    // Invalid credentials
    echo '<script>alert("Invalid email or password.");window.location.href = "login.html"</script>';
}

// Close the database connection
$conn->close();
?>
