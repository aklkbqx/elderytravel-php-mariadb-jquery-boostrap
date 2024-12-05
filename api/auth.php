<?php
require_once "../config.php";

if(isset($_REQUEST["register-btn"])){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $c_password = $_POST["c_password"];

    try{
        $fetchusers = sql("SELECT * FROM users WHERE email = ?",[$email])->fetch();
        if($fetchusers){
            throw new Exception("มีบัญชีนี้อยู่ในระบบแล้ว กรุณา<a href='../login.php'>เข้าสู่ระบบ</a>!");  
        }
        if($password !== $c_password){
            throw new Exception("รหัสผ่านไม่ตรงกัน!");
        }
        $passwordHash = password_hash($password,PASSWORD_DEFAULT);
        sql("INSERT INTO users(firstname,lastname,email,password) VALUES(?,?,?,?)",[
            $firstname,$lastname,$email,$passwordHash
        ]);
        $lastInsertId = $pdo->lastInsertId();
        $_SESSION["user_login"] = $lastInsertId;
        msg("success","✅สำเร็จ","คุณ $firstname สมัครสมาชิกสำเร็จแล้ว!","../");
    }catch(Exception $e){
        msg("danger","❌เกิดข้อผิดพลาด",$e->getMessage(),$_SERVER["HTTP_REFERER"]);
    }
}

if(isset($_REQUEST["login-btn"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    try{
        $fetchusers = sql("SELECT * FROM users WHERE email = ?",[$email]);
        if($fetchusers->rowCount() > 0){
            $row = $fetchusers->fetch();
            if(password_verify($password,$row["password"])){
                $_SESSION[$row['role']."_login"] = $row["user_id"];
                $location = $row["role"] == "admin" ? "../admin/" : "../";
                $firstname = $row["firstname"];
                msg("success","✅สำเร็จ","คุณ $firstname เข้าสู่ระบบสำเร็จแล้ว!",$location);
            }else{
                throw new Exception("รหัสผ่านของคุณไม่ถูกต้ง!");    
            }
        }else{
            throw new Exception("ไม่พบข้อมูลในระบบ!");
        }
        echo "success";
    }catch(Exception $e){
        msg("danger","❌เกิดข้อผิดพลาด",$e->getMessage(),$_SERVER["HTTP_REFERER"]);
    }
}


?>