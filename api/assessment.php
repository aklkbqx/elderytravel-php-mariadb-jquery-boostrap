<?php
require_once "../config.php";

if(isset($_REQUEST["sendAssessment"]) && isset($_GET["a_id"])){
    $a_id = $_GET["a_id"];
    $user_id = $_SESSION["user_login"];
    $responses = [];
    
    foreach($_POST as $index=>$post){
        if($index !== "sendAssessment"){
            $responses[$index] = $post;
        }
    }

    try{
        sql("INSERT INTO assessment_responses(a_id,user_id,responses) VALUES(?,?,?)",[
            $a_id,$user_id,json_encode($responses)
        ]);
        msg("success","✅สำเร็จ","ทำแบบประเมินสำเร็จ!",$_SERVER["HTTP_REFERER"]);
    }catch(Exception $e){
        msg("danger","❌เกิดข้อผิดพลาด",$e->getMessage(),$_SERVER["HTTP_REFERER"]);
    }
}

if(isset($_REQUEST["addVisit"]) && isset($_GET["a_id"])){
    $a_id = $_GET["a_id"];
    $user_id = $_SESSION["user_login"] ?? 0;
    try{
        sql("INSERT INTO assessment_visitors(a_id,user_id,count) VALUES(?,?,?)",[
            $a_id,$user_id,1
        ]);
    }catch(Exception $e){
        msg("danger","❌เกิดข้อผิดพลาด",$e->getMessage(),$_SERVER["HTTP_REFERER"]);
    }
}
?>