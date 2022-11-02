<?php
require_once "./config/connection.php";

if(!isset($_GET['product_id'])){
header('location: logout.php');
}

$product_id = $_GET['product_id'];


$sql = "DELETE FROM stock_tb WHERE id = $product_id";
$pdo->query($sql);

 $_SESSION['msg'] = '<div class="alert-success">
        <p>Record Deleted Successfully!!!</p>
        </div>';
header('location: notification.php');
?>