<?php
require_once "../config.php";

if(isset($_REQUEST["addPost"])){
    $session = isset($_SESSION["admin_login"]) ? "admin_login" : "user_login";
    $user_id = $_SESSION[$session];

    $title = $_POST["title"];
    $body = $_POST["body"];

    $post_image = $_FILES["post_image"]["name"];
    $tmp_name = $_FILES["post_image"]["tmp_name"];
    $path = "../../images/post_images/";

    try{
        if(!empty($post_image)){
            $extension = pathinfo($post_image)['extension'];
            $post_image_name = "post-".uniqid().".".$extension;
            move_uploaded_file($tmp_name,$path.$post_image_name);
        }else{
            $post_image_name = NULL;
        }

        sql("INSERT INTO news(title,body,image,user_id) VALUES(?,?,?,?)",[
            $title,$body,$post_image_name,$user_id
        ]);
        msg("success","✅สำเร็จ","ตั้งกระทู้สำเร็จ!",$_SERVER["HTTP_REFERER"]);
    }catch(Exception $e){
        msg("danger","❌เกิดข้อผิดพลาด",$e->getMessage(),$_SERVER["HTTP_REFERER"]);
    }
}

if(isset($_REQUEST["editPost"]) && isset($_GET["p_id"])){
    try{
        $p_id = $_GET["p_id"];
        $row = sql("SELECT * FROM posts WHERE p_id = ?",[$p_id])->fetch();

        $title = $_POST["title"];
        $body = $_POST["body"];

        $post_image = $_FILES["post_image"]["name"];
        $tmp_name = $_FILES["post_image"]["tmp_name"];
        $path = "../../images/post_images/";


        if(!empty($post_image)){
            $extension = pathinfo($post_image)['extension'];
            $post_image_name = "post-".uniqid().".".$extension;
            move_uploaded_file($tmp_name,$path.$post_image_name);
        }else{
            $post_image_name = $row["image"];
        }

        sql("UPDATE posts SET title=?,body=?,image=? WHERE p_id =?",[
            $title,$body,$post_image_name,$p_id
        ]);
        msg("success","✅สำเร็จ","แก้ไขกระทู้แล้ว!",$_SERVER["HTTP_REFERER"]);
    }catch(Exception $e){
        msg("danger","❌เกิดข้อผิดพลาด",$e->getMessage(),$_SERVER["HTTP_REFERER"]);
    }
}

if(isset($_REQUEST["deletePost"]) && isset($_GET["p_id"])){
    try{
        $p_id = $_GET["p_id"];
        $row = sql("SELECT * FROM posts WHERE p_id = ?",[$p_id])->fetch();

        $path = "../../images/post_images/";

        if(file_exists($path.$row["image"])){
            unlink($path.$row["image"]);
        }

        sql("DELETE FROM posts WHERE p_id = ?",[$p_id]);
        msg("success","✅สำเร็จ","ลบกระทู้ของคุณแล้ว!",$_SERVER["HTTP_REFERER"]);
    }catch(Exception $e){
        msg("danger","❌เกิดข้อผิดพลาด",$e->getMessage(),$_SERVER["HTTP_REFERER"]);
    }
}