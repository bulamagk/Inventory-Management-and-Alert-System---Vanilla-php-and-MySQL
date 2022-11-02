<?php
require_once "./config/connection.php";

if(!isset($_GET['product_id'])){
header('location: logout.php');
}

$product_id = $_GET['product_id'];
$product_image = $_GET['image'];


$sql = "DELETE FROM products_tb WHERE id = $product_id";
$pdo->query($sql);

if(file_exists($product_image)){
    unlink($product_image);
}

 $_SESSION['msg'] = '<div class="alert-success">
        <p>Product Deleted Successfully!!!</p>
        </div>';
header('location: product.php');
?>