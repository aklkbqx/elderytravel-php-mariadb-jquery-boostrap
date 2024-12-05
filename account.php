<?php
require_once "config.php";
require_once "util/link.php";

if(isset($_SESSION["user_login"])){
    $row = sql("SELECT * FROM users WHERE user_id = ?",[$_SESSION["user_login"]])->fetch();
}elseif(isset($_SESSION["admin_login"])){
    msg("warning","⚠คำเตือน","ไม่สามารถเข้าถึงหน้านี้ได้","./admin/");
}else{
    msg("warning","⚠คำเตือน","ไม่สามารถเข้าถึงหน้านี้ได้",$_SERVER["HTTP_REFERER"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
</head>
<body>

    <a href="/"><-กลับ</a>

    <div class='d-flex justify-content-center'>
        <label for="profile_image" class='btn btn-outline-light text-dark border-0'>
            <div class='d-flex flex-column'>
                <img src="<?= pathImage($row["image"],"user_images") ?>" style="width:200px;height:200px;" class='rounded-circle border overflow-hidden object-fit-cover'>
                <div>คลิกเพื่อเปลี่ยนรูปโปรไฟล์</div>
            </div>
        </label>
    </div> 

    <form action="api/user.php" method="post" enctype='multipart/form-data'>
        <input type="file" name='profile_image' id='profile_image' hidden>
        <input type="text" name='firstname' value='<?= $row["firstname"] ?>'>
        <input type="text" name='lastname' value='<?= $row["lastname"] ?>'>
        <?= $row["email"]; ?>
        <div>
            <input type="password" name='old_password'>
            <input type="password" name='new_password'>
            <input type="password" name='con_password'>
        </div>

        <button type="submit" name='save'>บันทึก</button>
        <button type="reset">ยกเลิก</button>
    </form>
</body>
</html>