<?php 
require_once "../../config.php";

if(isset($_REQUEST["addNews"])){
    $title = $_POST["title"];
    $body = $_POST["body"];

    $news_image = $_FILES["news_image"]["name"];
    $tmp_name = $_FILES["news_image"]["tmp_name"];
    $path = "../../images/news_images/";

    try{
        if(!empty($news_image)){
            $extension = pathinfo($news_image)['extension'];
            $news_image_name = "news-".uniqid().".".$extension;
            move_uploaded_file($tmp_name,$path.$news_image_name);
        }else{
            throw new Exception("กรุณาเพิ่มรูปภาพข่าวประชาสัมพันธ์");
        }
        sql("INSERT INTO news(title,body,image) VALUES(?,?,?)",[
            $title,$body,$news_image_name
        ]);
        msg("success","✅สำเร็จ","เพิ่มข่าวประชาสัมพันธ์สำเร็จ!",$_SERVER["HTTP_REFERER"]);
    }catch(Exception $e){
        msg("danger","❌เกิดข้อผิดพลาด",$e->getMessage(),$_SERVER["HTTP_REFERER"]);
    }
}

if(isset($_REQUEST["editNews"]) && isset($_GET["n_id"])){
    try{
        $n_id = $_GET["n_id"];
        $row = sql("SELECT * FROM news WHERE n_id = ?",[$n_id])->fetch();

        $title = $_POST["title"];
        $body = $_POST["body"];

        $news_image = $_FILES["news_image"]["name"];
        $tmp_name = $_FILES["news_image"]["tmp_name"];
        $path = "../../images/news_images/";

        if(!empty($news_image)){
            $extension = pathinfo($news_image)['extension'];
            $news_image_name = "news-".uniqid().".".$extension;
            move_uploaded_file($tmp_name,$path.$news_image_name);
        }else{
            $news_image_name = $row["image"];
        }
        sql("UPDATE news SET title=?,body=?,image=? WHERE n_id = ?",[
            $title,$body,$news_image_name,$n_id
        ]);
        msg("success","✅สำเร็จ","แก้ไขข่าวประชาสัมพันธ์สำเร็จ!",$_SERVER["HTTP_REFERER"]);
    }catch(Exception $e){
        msg("danger","❌เกิดข้อผิดพลาด",$e->getMessage(),$_SERVER["HTTP_REFERER"]);
    }
}

if(isset($_REQUEST["deleteNews"]) && isset($_GET["n_id"])){
    try{
        $n_id = $_GET["n_id"];
        $row = sql("SELECT * FROM news WHERE n_id = ?",[$n_id])->fetch();

        $path = "../../images/news_images/";

        if(file_exists($path.$row["image"])){
            unlink($path.$row["image"]);
        }

        sql("DELETE FROM news WHERE n_id = ?",[$n_id]);

        msg("success","✅สำเร็จ","ลบข่าวประชาสัมพันธ์สำเร็จ!",$_SERVER["HTTP_REFERER"]);
    }catch(Exception $e){
        msg("danger","❌เกิดข้อผิดพลาด",$e->getMessage(),$_SERVER["HTTP_REFERER"]);
    }
}