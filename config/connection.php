<?php
// Server and Database Info
$host = "localhost";
$db_name = "imas";
$db_user = "root";
$db_password = "";

// Data Source Name for PDO
$dsn = "mysql:host=".$host.";dbname=".$db_name;

try{
    $pdo = new PDO($dsn, $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    session_start();

    // if($pdo){
    //     echo 'connection Succesfull';
    // }
}catch(PDOException $e){
    $e->getMessage();
}
