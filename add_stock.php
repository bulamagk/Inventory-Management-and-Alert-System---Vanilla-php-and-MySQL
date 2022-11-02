<?php
require_once "./config/connection.php";

if(isset($_POST['add'])){
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $expire = $_POST['expire'];
        
    $sql = "INSERT INTO 
            stock_tb(product, quantity, price, expire)
            VALUES('$product', '$quantity', '$price', '$expire')";
    $pdo->query($sql);

    $_SESSION['msg'] = '<div class="alert-success">
        <p>Product Added to Stock Succesfully!!!</p>
        </div>';
    header('location: stock.php');
    
}

?>