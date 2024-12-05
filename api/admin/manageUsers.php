<?php 
require_once "../../config.php";

if(isset($_REQUEST["addUser"])){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $c_password = $_POST["c_password"];
    $role = $_POST["role"];

    $profile = $_FILES["profile_image"]["name"];
    $tmp_name = $_FILES["profile_image"]["tmp_name"];
    $path = "../../images/user_images/";

    try{
        if(!empty($profile)){
            $extension = pathinfo($profile)['extension'];
            $profile_image = "user-".uniqid().".".$extension;
            move_uploaded_file($tmp_name,$path.$profile_image);
        }else{
            $profile_image = "default-profile.jpg";
        }
        $fetchusers = sql("SELECT * FROM users WHERE email = ?",[$email])->fetch();
        if($fetchusers){
            throw new Exception("มีบัญชีนี้อยู่ในระบบแล้ว!");  
        }
        if($password !== $c_password){
            throw new Exception("รหัสผ่านไม่ตรงกัน!");
        }
        $passwordHash = password_hash($password,PASSWORD_DEFAULT);
        sql("INSERT INTO users(firstname,lastname,email,password,image,role) VALUES(?,?,?,?,?,?)",[
            $firstname,$lastname,$email,$passwordHash,$profile_image,$role
        ]);
        msg("success","✅สำเร็จ","สร้างสมาชิกสำเร็จแล้ว!",$_SERVER["HTTP_REFERER"]);
    }catch(Exception $e){
        msg("danger","❌เกิดข้อผิดพลาด",$e->getMessage(),$_SERVER["HTTP_REFERER"]);
    }
}

if(isset($_REQUEST["editUser"]) && isset($_GET["user_id"])){
    try{
        $user_id = $_GET["user_id"];
        $row = sql("SELECT * FROM users WHERE user_id = ?",[$user_id])->fetch();

        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $new_password = $_POST["new_password"];
        $con_password = $_POST["con_password"];
        $role = $_POST["role"];

        $profile = $_FILES["profile_image"]["name"];
        $tmp_name = $_FILES["profile_image"]["tmp_name"];
        $path = "../../images/user_images/";

        if(!empty($profile)){
            if($row["image"] !== "default-profile.jpg"){
                if(file_exists($path.$row["image"])){
                    unlink($path.$row["image"]);
                }
                $extension = pathinfo($profile)['extension'];
                $profile_image = "user-".uniqid().".".$extension;
                move_uploaded_file($tmp_name,$path.$profile_image);
            }
        }else{
            $profile_image = $row["image"];
        }

        if(!empty($new_password) && !empty($con_password)){
            if($new_password !== $con_password){
                throw new Exception("รหัสไม่ตรงกัน!");
            }
            $passwordHash = password_hash($password,PASSWORD_DEFAULT);
        }else{
            $passwordHash = $row["password"];
        }

        sql("UPDATE users SET firstname=?,lastname=?,password=?,image=?,role=? WHERE user_id = ?",[
            $firstname,$lastname,$passwordHash,$profile_image,$role,$user_id
        ]);
        msg("success","✅สำเร็จ","แก้ไขข้อมูลสมาชิกคุณ $firstname สำเร็จ!",$_SERVER["HTTP_REFERER"]);
    }catch(Exception $e){
        msg("danger","❌เกิดข้อผิดพลาด",$e->getMessage(),$_SERVER["HTTP_REFERER"]);
    }
}

if(isset($_REQUEST["deleteUser"]) && isset($_GET["user_id"])){
    try{
        $user_id = $_GET["user_id"];
        $row = sql("SELECT * FROM users WHERE user_id = ?",[$user_id])->fetch();

        $path = "../../images/user_images/";

        if($row["image"] !== "default-profile.jpg"){
            if(file_exists($path.$row["image"])){
                unlink($path.$row["image"]);
            }
        }
        $firstname = $row["firstname"];
        sql("DELETE FROM users WHERE user_id = ?",[$user_id]);
        msg("success","✅สำเร็จ","ลบบัญชี คุณ $firstname สำเร็จ!",$_SERVER["HTTP_REFERER"]);
    }catch(Exception $e){
        msg("danger","❌เกิดข้อผิดพลาด",$e->getMessage(),$_SERVER["HTTP_REFERER"]);
    }
}
?>