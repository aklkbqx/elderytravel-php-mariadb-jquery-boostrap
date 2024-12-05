<?php 
require_once "./config.php";
require_once "./util/link.php";

if(isset($_SESSION["user_login"])){
    $row = sql("SELECT * FROM users WHERE user_id = ?",[$_SESSION["user_login"]])->fetch();
}elseif(isset($_SESSION["admin_login"])){
    msg("warning","⚠คำเตือน","ไม่สามารถเข้าถึงหน้านี้ได้","./admin/");
}else{
    msg("warning","⚠คำเตือน","ไม่สามารถเข้าถึงหน้านี้ได้","../");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHAT</title>
</head>
<body class="bg-light">
    <div class='vh-100 d-flex justify-content-center align-items-center'>
        <div class='bg-white rounded-4 border overflow-hidden shadow' style='width:1200px;height:800px'>
            <div class="d-flex h-100">
                <div class="p-3" style="width:400px">
                    <h5 class='mb-3 text-center'>ส่งข้อความ...</h5>   
                    <div class='d-flex flex-column gap-2'>
                        <h6 clsss="text-muted">ผู้ดูแลระบบ</h6>
                        <?php $fetchAllAdmins = sql("SELECT * FROM users WHERE role = 'admin' AND user_id != ?",[$row["user_id"]]);
                        while($user = $fetchAllAdmins->fetch()){ ?>
                            <a href="chat.php?user_id=<?= $user["user_id"] ?>" class="d-flex align-items-center gap-2 btn btn-outline-light text-dark border-0 rounded-4 <?= isset($_GET["user_id"]) && $_GET["user_id"] == $user["user_id"] ? "active" : "" ?>">
                                <img src="<?= pathImage($user["image"],"user_images"); ?>" width="50px" height="50px" class="rounded-circle border overflow-hidden">
                                <h6><?= $user["firstname"]; ?> <?= $user["lastname"]; ?></h6>
                            </a>
                        <?php } ?>
                    </div>

                    <div class='d-flex flex-column gap-2 mt-2'>
                        <h6 clsss="text-muted">สมาชิกทั่วไป</h6>
                        <?php $fetchAllUsers = sql("SELECT * FROM users WHERE role = 'user' AND user_id != ?",[$row["user_id"]]);
                        while($user = $fetchAllUsers->fetch()){ ?>
                            <a href="chat.php?user_id=<?= $user["user_id"] ?>" class="d-flex align-items-center gap-2 btn btn-outline-light text-dark border-0 rounded-4 <?= isset($_GET["user_id"]) && $_GET["user_id"] == $user["user_id"] ? "active" : "" ?>">
                                <img src="<?= pathImage($user["image"],"user_images"); ?>" width="50px" height="50px" class="rounded-circle border overflow-hidden">
                                <h6><?= $user["firstname"]; ?> <?= $user["lastname"]; ?></h6>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <div class='d-flex flex-column w-100 me-3'>
                    <div class='p-3 w-100'>
                        <?php if(isset($_GET["user_id"])){
                            $fetchUser = sql("SELECT * FROM users WHERE user_id = ?",[$_GET["user_id"]])->fetch(); ?>
                            <div class="d-flex align-items-center gap-2">
                                <img src="<?= pathImage($fetchUser["image"],"user_images"); ?>" width="50px" height="50px" class="rounded-circle border overflow-hidden">
                                <h6><?= $fetchUser["firstname"]; ?> <?= $fetchUser["lastname"]; ?></h6>
                            </div>
                        <?php } ?>
                    </div>
                    <div class='h-100 bg-light rounded-4 overflow-auto p-3 w-100'>
                        <?php if(isset($_GET["user_id"])){
                            $fetchUser = sql("SELECT * FROM users WHERE user_id = ?",[$_GET["user_id"]])->fetch(); ?>
                            <div class="d-flex align-items-start gap-2 justify-content-start my-2">
                                <img src="<?= pathImage($fetchUser["image"],"user_images"); ?>" width="40px" height="40px" class="rounded-circle border overflow-hidden">
                                <div class="bg-white rounded-4 p-2" style='max-width:400px'>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae, perferendis aliquam dolore minus aut, rem maxime architecto itaque obcaecati sapiente, debitis perspiciatis officiis accusantium non.
                                </div>
                            </div>
                        <?php } ?>

                        <div class="d-flex align-items-start gap-2 justify-content-end my-2">
                            <div class="bg-primary rounded-4 p-2 text-white" style='max-width:400px'>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae, perferendis aliquam dolore minus aut, rem maxime architecto itaque obcaecati sapiente, debitis perspiciatis officiis accusantium non.
                            </div>
                            <img src="<?= pathImage($row["image"],"user_images"); ?>" width="40px" height="40px" class="rounded-circle border overflow-hidden">
                        </div>
                    </div>
                    <form id='form-message' class='d-flex align-items-center gap-2 pt-3 pb-3'>
                        <input type="text" name='message' class='form-control'>
                        <button type="submit" class='btn btn-light border'>ส่ง</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>