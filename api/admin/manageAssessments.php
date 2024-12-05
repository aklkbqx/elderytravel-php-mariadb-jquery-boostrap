<?php require_once "../../config.php";

if(isset($_REQUEST["addAssessment"])){
    $title = $_POST["title"];
    $description = $_POST["description"];
    $questions = [];

    foreach($_POST as $index=>$q){
        if($index !== "addAssessment" && $index !== "title" && $index !== "description"){
            $questions[$index] = $q;
        }
    }

    try{
        sql("INSERT INTO assessments(title,description,questions) VALUES(?,?,?)",[$title,$description,json_encode($questions)]);
        msg("success","✅สำเร็จ","เพิ่มแบบประเมินสำเร็จ!",$_SERVER["HTTP_REFERER"]);
    }catch(Exception $e){
        msg("danger","❌เกิดข้อผิดพลาด",$e->getMessage(),$_SERVER["HTTP_REFERER"]);
    }
}

if(isset($_REQUEST["editAssessment"]) && isset($_GET["a_id"])){
    $a_id = $_GET["a_id"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $questions = [];

    foreach($_POST as $index=>$q){
        if($index !== "editAssessment" && $index !== "title" && $index !== "description"){
            $questions[$index] = $q;
        }
    }

    try{
        sql("UPDATE assessments SET title=?,description=?,questions=? WHERE a_id = ?",[
            $title,
            $description,
            json_encode($questions),
            $a_id
        ]);
        msg("success","✅สำเร็จ","ลบแบบประเมินเสร็จสิ้น!",$_SERVER["HTTP_REFERER"]);
    }catch(Exception $e){
        msg("danger","❌เกิดข้อผิดพลาด",$e->getMessage(),$_SERVER["HTTP_REFERER"]);
    }
}

if(isset($_REQUEST["deleteAssessment"]) && isset($_GET["a_id"])){
    $a_id = $_GET["a_id"];
    try{
        sql("DELETE FROM assessments WHERE a_id = ?",[$a_id]);
        msg("success","✅สำเร็จ","ลบแบบประเมินเสร็จสิ้น!",$_SERVER["HTTP_REFERER"]);
    }catch(Exception $e){
        msg("danger","❌เกิดข้อผิดพลาด",$e->getMessage(),$_SERVER["HTTP_REFERER"]);
    }
}
?>