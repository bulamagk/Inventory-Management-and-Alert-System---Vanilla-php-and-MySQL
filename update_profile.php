<?php
require_once "./config/connection.php";

if(isset($_POST['update_profile'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($password == $confirm_password){
        $sql = "UPDATE users_tb SET fullname = '$fullname', phone = '$phone', password = '$password' WHERE email = '$email'";
            $pdo->query($sql);
            
            $_SESSION['msg'] = '<div class="alert-success">
            <p>Profile Updated Successfully!!!</p>
            </div>';
            header('location: profile.php');
    }else {
        $_SESSION['msg'] = '<div class="alert">
        <p>Profile Update Failed!!!</p>
        <p>Passwords Does Not Match!!!</p>
        </div>';
        header('location: profile.php');
    }
}

?>