<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Close connection

$conn->close();

// With ping() check if connection is still active
if($conn->ping()){
    echo 'Connection is ok';
} else {
    echo 'Error: %s\n'. $conn->error;
}
