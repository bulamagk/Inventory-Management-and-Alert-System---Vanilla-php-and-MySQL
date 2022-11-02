<?php 
require_once "./config/connection.php";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users_tb WHERE email = '$email' AND password = '$password'";
    $user = $pdo->query($sql)->fetch();
    $role = $user->role;
    $rows = $pdo->query($sql)->rowCount();
    
    if($rows > 0){
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $role;
        header('location: home.php');
    }else{
        $_SESSION['msg'] = '<div class="alert">
        <p>Wrong Email and/or Password</p>
        </div>';
        header('location: index.php');
    }

}else{
    header('location: index.php');
}

?>