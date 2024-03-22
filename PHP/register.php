<?php
// Establish connection to MySQL
$servername = "localhost:3306";
$username = "root";
$password = "12345";
$dbname = "vijay";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['email'];
$password = $_POST['password'];

// Insert into database
$sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>