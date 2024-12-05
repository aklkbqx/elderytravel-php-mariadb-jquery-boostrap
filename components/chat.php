<div class='position-absolute' style="bottom:1rem;right:1rem;">
    <div class="dropup">
        <div class="btn btn-light rounded-circle d-flex align-items-center justify-content-center dropdown-toggle" data-bs-toggle='dropdown' style="width:70px;height:70px">
            <div style='font-size:35px;transform: scaleX(-1);' class="mb-1">💭</div>
        </div>

        <div class="dropdown-menu p-3 rounded-4" style='width:400px'>
            <h5 class='mb-3 text-center'>ส่งข้อความ...</h5>
            <div class='d-flex flex-column gap-2'>
                <h6 clsss="text-muted">ผู้ดูแลระบบ</h6>
                <?php $fetchAllAdmins = sql("SELECT * FROM users WHERE role = 'admin'");
                while($user = $fetchAllAdmins->fetch()){ ?>
                    <a href="chat.php?user_id=<?= $user["user_id"] ?>" class="d-flex align-items-center gap-2 btn btn-outline-light text-dark border-0 rounded-4">
                        <img src="<?= pathImage($user["image"],"user_images"); ?>" width="50px" height="50px" class="rounded-circle border overflow-hidden">
                        <h6><?= $user["firstname"]; ?> <?= $user["lastname"]; ?></h6>
                    </a>
                <?php } ?>
            </div>

            <div class='d-flex flex-column gap-2 mt-2'>
                <h6 clsss="text-muted">สมาชิกทั่วไป</h6>
                <?php $fetchAllUsers = sql("SELECT * FROM users WHERE role = 'user'");
                while($user = $fetchAllUsers->fetch()){ ?>
                    <a href="chat.php?user_id=<?= $user["user_id"] ?>" class="d-flex align-items-center gap-2 btn btn-outline-light text-dark border-0 rounded-4">
                        <img src="<?= pathImage($user["image"],"user_images"); ?>" width="50px" height="50px" class="rounded-circle border overflow-hidden">
                        <h6><?= $user["firstname"]; ?> <?= $user["lastname"]; ?></h6>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>