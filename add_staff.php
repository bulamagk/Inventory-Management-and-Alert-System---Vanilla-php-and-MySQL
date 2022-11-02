<?php
require_once "./config/connection.php";

if(isset($_POST['add'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $sql = "INSERT INTO users_tb(fullname, email, phone, password)
            VALUES('$fullname', '$email', '$phone', '$password')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':fullname' => $fullname, ':email' => $email, ':phone' => $phone, ':password' => $password]);
    $_SESSION['msg'] = '<div class="alert-success">
        <p>Staff Added Succesfully!!!</p>
        </div>';
    header('location: staff.php');
}

?>