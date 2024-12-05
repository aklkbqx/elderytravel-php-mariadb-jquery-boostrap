<?php 
require_once "../config.php";
require_once "../util/link.php";

if($_SERVER["REQUEST_URI"] == "/admin/"){
    header("location: ?home");
    exit;
}

if(isset($_SESSION["admin_login"])){
    $row = sql("SELECT * FROM users WHERE user_id = ?",[$_SESSION["admin_login"]])->fetch();
}elseif(isset($_SESSION["user_login"])){
    msg("warning","⚠คำเตือน","ไม่สามารถเข้าถึงหน้านี้ได้","../");
}else{
    msg("warning","⚠คำเตือน","ไม่สามารถเข้าถึงหน้านี้ได้","../");
}

$pageAdmin = [
    "home" => "หน้าแรก",
    "manageUsers" => "จัดการสมาชิก",
    "manageNews" => "จัดการข่าวสารประชาสัมพันธ์",
    "manageAssessments" => "จัดการแบบประเมิน"
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    
    <ul class='list-group' style='list-style-type:none'>
        <?php foreach($pageAdmin as $index=>$page){ ?>
            <a href="?<?= $index; ?>" class='list-group-item <?= isset($_GET[$index]) ? "active" : "" ?>'><li><?= isset($_GET[$index]) ? "> " : "" ?><?= $page; ?></li></a> 
        <?php } ?>
    </ul>

    <a href="?logout">Logout</a>

   <div class='container'>
        <?php foreach($pageAdmin as $index=>$page){ 
            if(isset($_GET[$index])){
                require_once "./components/" . $index . ".php";
            }
        } ?>
   </div>

</body>
</html>