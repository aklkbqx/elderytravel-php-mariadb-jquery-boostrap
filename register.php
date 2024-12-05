<?php
require_once "config.php";
require_once "util/link.php";

if(isset($_SESSION["admin_login"])){
    msg("warning","⚠คำเตือน","คุณได้เข้าสู่ระบบ admin อยู่แล้ว ไม่สามารถเข้าถึงหน้านี้ได้","./admin/");
}elseif(isset($_SESSION["user_login"])){
    msg("warning","⚠คำเตือน","คุณได้เข้าสู่ระบบ user อยู่แล้ว ไม่สามารถเข้าถึงหน้านี้ได้","/");
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

    <form action="api/auth.php" method="post">
        <input type="text" name='firstname' required placeholder="ชื่อ">
        <input type="text" name='lastname' required placeholder="นามสกุล">
        <input type="email" name='email' required placeholder="อีเมล">
        <input type="password" name='password' required placeholder="รหัสผ่าน">
        <input type="password" name='c_password' required placeholder="ยืนยันรหัสผ่าน">
        <button type="submit" name='register-btn'>Register</button>
    </form>

    <a href="login.php">login</a>
</body>
</html>