<?php
require_once "./config/connection.php";

if(!isset($_GET['sale_id'])){
header('location: logout.php');
}

$sale_id = $_GET['sale_id'];


$sql = "DELETE FROM sales_tb WHERE id = $sale_id";
$pdo->query($sql);

 $_SESSION['msg'] = '<div class="alert-success">
        <p>Sale Deleted Successfully!!!</p>
        </div>';
header('location: sales.php');
?>