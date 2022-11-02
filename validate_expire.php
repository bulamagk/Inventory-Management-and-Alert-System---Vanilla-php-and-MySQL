<?php
require_once "./config/connection.php";

$current_date = date('Y-m-d');

// GET EXPIRED PRODUCTS
$sql = "SELECT * FROM stock_tb WHERE is_expire = 'false'";
$rows = $pdo->query($sql)->fetchAll();

foreach($rows as $row){
    $expire = $row->expire;
    $id = $row->id;
    $price = $row->price;
    $quantity = $row->quantity;

    $current_date = date_create('2022-11-01');
    $expire = date_create($expire);

    $date_differecence = date_diff($expire, $current_date);

    $date_differecence = $date_differecence->format('%a');

    if($date_differecence == 0){
        $total_loss = $price * $quantity;
        $sql = "UPDATE stock_tb SET is_expire = 'true', days_to_expire = '0', total_loss = '$total_loss' WHERE id = '$id'";
        $pdo->query($sql);

        echo '
        <script>
        alert("'.$row->product.' Has Expired")
        </script>';
    }

    if($date_differecence <= 30){
        $sql = "UPDATE stock_tb SET days_to_expire = '$date_differecence' WHERE id = '$id'";
        $pdo->query($sql);
    }

}




?>