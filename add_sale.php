<?php
require_once "./config/connection.php";

if(isset($_POST['add'])){
    $product = $_POST['product'];
    $quantity_sale = $_POST['quantity_sale'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];
    $customer = $_POST['customer'];
    $customer_contact = $_POST['customer_contact'];
    $date = $_POST['date'];

    // Reduce Product Quantity in Stock
    $sql = "SELECT * FROM stock_tb WHERE product = '$product'";
    $old_quantity = $pdo->query($sql)->fetch()->quantity;
    $new_quantity = $old_quantity - $quantity_sale;

    $sql = "UPDATE stock_tb SET quantity = '$new_quantity' WHERE product = '$product'";
    $pdo->query($sql);
    
    // Add New Sale
    $sql = "INSERT INTO 
            sales_tb(product, quantity, price, amount, customer, customer_contact, date)
            VALUES('$product', '$quantity_sale', '$price', '$amount', '$customer', '$customer_contact', '$date')";
    $pdo->query($sql);

    $_SESSION['msg'] = '<div class="alert-success">
        <p>Sales Added Succesfully!!!</p>
        </div>';
    header('location: sales.php');
    
}

?>