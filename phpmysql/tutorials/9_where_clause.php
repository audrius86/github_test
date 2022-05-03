<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname FROM MyGuests WHERE firstname='Audrius'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();

/*
 * SELECT * FROM Products WHERE Price BETWEEN 50 AND 60; Tarp 50 ir 60
 * SELECT * FROM Customers WHERE City LIKE 's%'; Kur miestas turi S
 * SELECT * FROM Customers WHERE City IN ('Paris','London');
 * SELECT * FROM Customers WHERE Country='Germany' AND City='Berlin';
 * SELECT * FROM Customers WHERE City='Berlin' OR City='München';
 * SELECT * FROM Customers WHERE NOT Country='Germany';
 *
 * Combine AND, OR and NOT
 *
 * SELECT * FROM Customers WHERE Country='Germany' AND (City='Berlin' OR City='München');
 * SELECT * FROM Customers WHERE NOT Country='Germany' AND NOT Country='USA';
 */