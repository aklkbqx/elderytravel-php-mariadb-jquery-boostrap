<nav class='w-100 position-fixed d-flex justify-content-center' style='top:10px;'>
    <div class='container d-flex shadow bg-white p-3 rounded-5 align-items-center justify-content-between' style='height:80px'>
        <a href="/"><img src="<?= pathImage("logo.png","web_images") ?>" alt="" class="object-fit-cover" style='width:65px;height:60px;'></a>
        
        <ul class='d-sm-flex align-items-center gap-3 m-0 p-0 d-none' style='list-style: none;'>
            <a href="" class='text-decoration-none'><li>หน้าแรก</li></a>
            <a href="" class='text-decoration-none'><li>กระดานสนทนา</li></a>
            <a href="" class='text-decoration-none'><li>สถานที่ท่องเที่ยว</li></a>
            <a href="" class='text-decoration-none'><li>ติดต่อเรา</li></a>
        </ul>

        <?php if(isset($_SESSION["user_login"])){ ?>
            <div class='dropdown'>
                <div class='btn btn-outline-light text-dark border-0 rounded-4 dropdown-toggle d-flex align-items-center gap-2' data-bs-toggle='dropdown'>
                    <img src="<?= pathImage($row["image"],"user_images") ?>" style="width:45px;height:45px;" class='rounded-circle border overflow-hidden object-fit-cover'>
                    <h6 class='m-0'><?= $row["firstname"] ?></h6>
                </div>
                <ul class='dropdown-menu'>
                    <a href="./account.php" class='dropdown-item'><li>จัดการบัญชี</li></a>
                    <div class='dropdown-divider'></div>
                    <a href="?logout" class='dropdown-item text-danger'><li>ออกจากระบบ</li></a>
                </ul>
            </div>
        <?php } else{ ?>
            <div class='d-flex align-items-center gap-2'>
                <a href="register.php" class='btn btn-primary rounded-4'>สมัครสมาชิก</a>
                <a href="login.php" class='btn btn-light rounded-4'>เข้าสู่ระบบ</a>
            </div>
        <?php } ?>

    </div>
</nav>