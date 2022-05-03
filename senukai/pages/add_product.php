<?php
$param = $_GET['param'] ?? null;
if($param == 'save_product'){
    $product_name = $_POST['product_name'];
    $amount = $_POST['amount'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    var_dump($price);

    $sql = "INSERT INTO `product` (`name`, `amount`, `price`, `category_id`) VALUES ('$product_name', '$amount', '$price', '$category_id')";

    $action = mysqli_query($connection, $sql);

    if($action){
        header('Location: index.php?page=index');
    }
    else{
        echo 'Error Occurred';
    }
}
?>

//hidden field, arba GET parametra

<form action="index.php?param=save_product" method="post">
    <label for="name">Product name:</label><br>
    <input type="text" name="product_name" id="name" required> <br><br>

    <label for="amount">Amount:</label><br>
    <input type="number" name="amount" id="amount" required> <br><br>

    <label for="price">Price:</label><br>
    <input type="number" step="0.01" name="price" id="price" required> <br><br>

    <?php

    $sql = "SELECT * FROM category";
    $action = mysqli_query($connection ,$sql);

    echo "<select name='category_id'>";
    while ($row = mysqli_fetch_array($action)) {
        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
    }
    echo "</select>";
    ?>
    <br><br>
    <button type="submit" name="submit">Save New Product</button>
</form>
