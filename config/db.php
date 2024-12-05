<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "eldery_db";

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;",$username,$password);
    // echo "connected";
}catch(PDOException $e){
    echo $e->getMessage();
}
?>