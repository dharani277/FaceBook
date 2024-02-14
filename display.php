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

$query = "SELECT * FROM profile";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>First Name: " . $row['first_name'] . "</p>";
        echo "<p>Last Name: " . $row['last_name'] . "</p>";
        echo "<p>Email: " . $row['email'] . "</p>";
        echo "<p>Phone: " . $row['phone'] . "</p>";
        echo "<hr>";
    }
} else {
    echo "No users registered yet.";
}

$conn->close();
?>
