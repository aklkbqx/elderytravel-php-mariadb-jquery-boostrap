<div class='d-flex justify-content-between'>
    <h4>จัดการสมาชิก</h4>
    <button type='button' data-bs-target='#addUser' data-bs-toggle='modal' class='btn btn-primary'>เพิ่มสมาชิก</button>

    <div class="modal fade" id='addUser'>
        <div class="modal-dialog modal-dialog-centered ">
            <form method="post" enctype="multipart/form-data" action="../api/admin/manageUsers.php" class="modal-content">
                <div class="modal-header">
                    <h4>เพิ่มสมาชิก</h4>
                    <button type="button" data-bs-dismiss='modal' class='btn-close'></button>
                </div>
                <div class="modal-body d-flex flex-column gap-2">
                    <label for="profile" class='d-flex justify-content-center btn btn-outline-light'>
                        <img id='preview-profile' src="<?= pathImage("default-profile.jpg","user_images") ?>" class='rounded-circle border object-fit-cover' style='width:150px;height:150px;'>
                    </label>
                    <input type="file" name='profile_image' hidden id='profile' onchange="$('#preview-profile').attr('src',window.URL.createObjectURL(this.files[0]))">
                    <div class="form-floating">
                        <input type="text" class='form-control' placeholder="ชื่อ" name='firstname'>
                        <label for="ชื่อ">ชื่อ</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class='form-control' placeholder="นามสกุล" name='lastname'>
                        <label for="นามสกุล">นามสกุล</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class='form-control' placeholder="อีเมล" name='email'>
                        <label for="อีเมล">อีเมล</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class='form-control' placeholder="รหัสผ่าน" name='password'>
                        <label for="รหัสผ่าน">รหัสผ่าน</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class='form-control' placeholder="ยืนยันรหัสผ่าน" name='c_password'>
                        <label for="ยืนยันรหัสผ่าน">ยืนยันรหัสผ่าน</label>
                    </div>
                    <select name="role" class='form-select pointer'>
                        <option value="user" selected>ผู้ใช้งานทั่วไป</option>
                        <option value="admin">ผู้ดูแลระบบ</option>
                    </select>
                </div>
                <div class="modal-footer w-100">
                    <div class='w-100 d-flex gap-2'>
                        <button type='button' class='btn btn-light w-100' data-bs-dismiss="modal">ยกเลิก</button>
                        <button type='submit' class='btn btn-primary w-100' name='addUser'>ยืนยันการเพิ่ม</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class='table-responsive'>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>ID</th>
                <th>ชื่อ-นามสกุล</th>
                <th>อีเมล</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>