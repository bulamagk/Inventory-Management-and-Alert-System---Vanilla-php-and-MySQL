<?php 
require_once "./config/connection.php";

if(isset($_GET['name'])){
    $product = $_GET['name'];

    $sql = "SELECT * FROM stock_tb WHERE product = '$product'";
    $product = $pdo->query($sql)->fetch();

    echo json_encode($product);
}
?>