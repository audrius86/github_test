<?php

include_once 'config.php';
/*
 * 1. Susikurti kategoriju forma (id,name)
 * 2. Sukurti kategoriju pridejima i duomenu baze
 * 3. Pasiimti kategorijas is duomenu bazes
 * 4. Sukurti prekiu forma (id,name,amount,price,category_id)
 * 5. Ideti i prekiu forma pasiimtas kategorijas kaip select
 * 6. Sukurti produktu pridejima i duomenu baze
 * 7. Pasiimti produktus is duomenu bazes
 * 8. Su foreach atvaizduoti prekiu sarasa lenteleje
 */

if(isset($_POST['category'])){
    $category_name = $_POST['category'];
    $sql = "INSERT INTO `category` (`name`) VALUES ('$category_name')";
    $action = mysqli_query($connection, $sql);

    if($action){
        header('Location: index.php');
    }
    else{
        echo 'Error Occurred';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0>"
    <title></title>
    <style>
        <?php include 'index.css'; ?>
    </style>
</head>
<body>
<table>
    <tr>
        <td>
            <a href="index.php?page=index">Home</a>
        </td>
        <td>
            <a href="index.php?page=add_category">Add Category</a>
        </td>
        <td>
            <a href="index.php?page=add_product">Add Product</a>
        </td>
    </tr>
</table>
<?php if($page === 'index') { ?>
<h2>All Products</h2>


<?php
$sql = "SELECT * FROM product";
$action = mysqli_query($connection ,$sql);

echo "<ul>";
while ($row = mysqli_fetch_array($action)) {
    echo "<li>" . $row['name'] . ' - Amount: ' . $row['amount'] . '. Product price: ' . $row['price'] .  "</li>";
}
echo "</u>";

?>
<?php } ?>


<form action="index.php" method="post">
    <input type="text" name="category" placeholder="New category name">
    <button type="submit">Add Category</button>
</form>

</body>
</html>
