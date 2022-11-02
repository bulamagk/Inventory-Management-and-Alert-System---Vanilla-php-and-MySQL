<?php
require_once "./config/connection.php";

if(!isset($_GET['sid'])){
header('location: logout.php');
}

$sid = $_GET['sid'];

$sql = "DELETE FROM users_tb WHERE id = $sid";
$pdo->query($sql);

 $_SESSION['msg'] = '<div class="alert-success">
        <p>Staff Deleted Successfully!!!</p>
        </div>';
header('location: staff.php');
?>