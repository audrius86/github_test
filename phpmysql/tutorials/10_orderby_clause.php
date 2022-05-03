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
// SELECT column_name(s) FROM table_name ORDER BY column_name(s) ASC|DESC
$sql = "SELECT id, firstname, lastname FROM MyGuests ORDER BY firstname ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

/*
 * SELECT * FROM Customers ORDER BY Country, CustomerName;
 *
 * The following SQL statement selects all customers from the "Customers" table, sorted ascending by the "Country" and descending by the "CustomerName" column:
 *
 * SELECT * FROM Customers ORDER BY Country ASC, CustomerName DESC;
 */

?>

