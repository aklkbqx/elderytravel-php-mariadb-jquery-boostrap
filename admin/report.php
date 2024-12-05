<?php 
require_once "../config.php";
require_once "../util/link.php";

if(isset($_SESSION["admin_login"])){
    $row = sql("SELECT * FROM users WHERE user_id = ?",[$_SESSION["admin_login"]])->fetch();
}elseif(isset($_SESSION["user_login"])){
    msg("warning","⚠คำเตือน","ไม่สามารถเข้าถึงหน้านี้ได้","../");
}else{
    msg("warning","⚠คำเตือน","ไม่สามารถเข้าถึงหน้านี้ได้","../");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>