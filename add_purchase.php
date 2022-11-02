<?php
require_once "./config/connection.php";

if(isset($_POST['add'])){
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $total = $_POST['total'];
    $vendor = $_POST['vendor'];
    $vendor_contact = $_POST['vendor_contact'];
    $date = $_POST['date'];
   
    // echo $vendor_contact; die();
        
    $sql = "INSERT INTO 
            purchase_tb(product, quantity, price, amount, vendor, vendor_contact, date)
            VALUES('$product', '$quantity', '$price', '$total', '$vendor', '$vendor_contact', '$date')";
    $pdo->query($sql);

    $_SESSION['msg'] = '<div class="alert-success">
        <p>Purchase Added Succesfully!!!</p>
        </div>';
    header('location: purchase.php');
    
}

?>