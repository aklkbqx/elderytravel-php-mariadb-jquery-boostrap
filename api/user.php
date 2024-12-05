<?php require_once "../config.php";

if(isset($_REQUEST["save"])){
    try{
        $row = sql("SELECT * FROM users WHERE user_id = ?",[$_SESSION["user_login"]])->fetch();

        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];

        $old_password = $_POST["old_password"];
        $new_password = $_POST["new_password"];
        $con_password = $_POST["con_password"];

        $profile = $_FILES["profile_image"]["name"];
        $tmp_name = $_FILES["profile_image"]["tmp_name"];
        $path = "../images/user_images/";

        if($profile){
            if($row["image"] !== "default-profile.jpg"){
                if(file_exists($path.$row["image"])){
                    unlink($path.$row["image"]);
                }
            }
            $extension = pathinfo($profile)['extension'];
            $profile_image = "user-".uniqid().".".$extension;
            move_uploaded_file($tmp_name,$path.$profile_image);
        }else{
            $profile_image = $row["image"];
        }
        if(!empty($old_password) && !password_verify($old_password,$row["password"])){
            throw new Exception("รหัสผ่านเดิมไม่ถูกต้อง!");
        }
        if(!empty($new_password) && !empty($con_password)){
            if($new_password !== $con_password){
                throw new Exception("รหัสไม่ตรงกัน!");
            }
            $passwordHash = password_hash($new_password,PASSWORD_DEFAULT);
        }else{
            $passwordHash = $row["password"];
        }
        sql("UPDATE users SET firstname=?,lastname=?,password=?,image=? WHERE user_id = ?",[
            $firstname,$lastname,$passwordHash,$profile_image,$row["user_id"]
        ]);
        msg("success","✅สำเร็จ","คุณ $firstname แก้ไขข้อมูลสำเร็จ!",$_SERVER["HTTP_REFERER"]);
    }catch(Exception $e){
        msg("danger","❌เกิดข้อผิดลาด",$e->getMessage(),$_SERVER["HTTP_REFERER"]);
    }
}
?>