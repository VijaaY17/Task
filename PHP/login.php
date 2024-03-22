<?php
// Establish connection to MySQL
$servername = "localhost:3306";
$username_db = "root";
$password_db = "12345";
$dbname = "vijay";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// 1) Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//  2) Retrieve form data
$username = $_POST['email'];
$password = $_POST['password'];

// 3) Prepare and bind the statement
$stmt = $conn->prepare("SELECT * FROM user WHERE username=? AND password=?");
$stmt->bind_param("ss", $username, $password);

//  4) Execute the statement
$stmt->execute();

//  5) Store the result
$stmt->store_result();

$response = array();

// Check if any rows are returned
if ($stmt->num_rows > 0) {
    $response['status'] = "logined";
} else {
    $response['status'] = "failed";
}

//  6)Close statement and connection
$stmt->close();
$conn->close();

// Output response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
