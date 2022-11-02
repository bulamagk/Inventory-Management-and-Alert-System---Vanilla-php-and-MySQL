<?php
require_once "./config/connection.php";

if(isset($_POST['add'])){
    $name = $_POST['name'];

    if(isset($_FILES['picture'])){
        $file_temp = $_FILES['picture']['tmp_name'];
        $file_path = './products/'.$name.'.jpg';

        move_uploaded_file($file_temp, $file_path);
        
        $sql = "INSERT INTO products_tb(name, image)
                VALUES('$name', '$file_path')";
        $pdo->query($sql);

        $_SESSION['msg'] = '<div class="alert-success">
            <p>Product Added Succesfully!!!</p>
            </div>';
        header('location: product.php');
    }
}

?>