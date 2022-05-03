<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// The SELECT DISTINCT statement is used to return only distinct (different) values.
//SELECT COUNT(DISTINCT Country) FROM Customers;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}

echo "<br>";

$sql2 = "SELECT * FROM MyGuests";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>" . " Email: " . $row["email"] . " Date: " . $row["reg_date"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
