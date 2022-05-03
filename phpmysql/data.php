<style>
    <?php include 'style.css' ?>
</style>
<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test1';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `id`, `name`, `bgroup` FROM `users`";
$result = $conn->query($sql);

if ($result->num_rows > 0) { ?>
    <table>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Blood Group</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row["id"] ?></td>
                <td><?php echo $row["name"] ?></td>
                <td><?php echo $row["bgroup"] ?></td>
            </tr>
        <?php } ?>
    </table>

<?php } else {
    echo "0 results";
}
$conn->close();
?>
<input type="button" value="Add Another Person" onClick="document.location.href='index.php'">
