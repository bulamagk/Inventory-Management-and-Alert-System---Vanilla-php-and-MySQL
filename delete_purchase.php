<?php
require_once "./config/connection.php";

if(!isset($_GET['purchase_id'])){
header('location: logout.php');
}

$purchase_id = $_GET['purchase_id'];


$sql = "DELETE FROM purchase_tb WHERE id = $purchase_id";
$pdo->query($sql);

 $_SESSION['msg'] = '<div class="alert-success">
        <p>Purchased Deleted Successfully!!!</p>
        </div>';
header('location: purchase.php');
?>