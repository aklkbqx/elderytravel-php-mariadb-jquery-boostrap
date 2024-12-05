<?php 
function sql($sql,$params=[]){
    global $pdo;
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt;
}

function msg($type,$title,$body,$location){
    echo json_encode([$type,$title,$body,$location]);
    $_SESSION[$type] = [$title,$body];
    if($location){
        header("location: " . $location);
        exit;
    }
}

foreach(["success","warning","danger"] as $index=>$type){
    if(isset($_SESSION[$type])){ ?>
        <div id='alert-msg' class='position-fixed opacity-0' style='top:10px;right:10px;z-index:999;'>
            <div class='alert alert-<?= $type; ?> rounded-4 shadow position-relative' style='width:300px'>
                <div class='position-absolute d-flex align-items-center gap-2' style='top:10px;right:10px;'>
                    <div><span id='count-msg'>5</span>s</div>
                    <button type='button' id='close-msg' class='btn-close'></button>
                </div>
                <h4 class='m-0'><?= $_SESSION[$type][0] ?></h4>
                <p class='m-0'><?= $_SESSION[$type][1] ?></p>
            </div>
        </div>
    <?php unset($_SESSION[$type]); }
}

function pathImage($image,$type="user_images"){
    return $_SERVER["REQUEST_URI"] == "/" ? "./images/$type/$image" : "../images/$type/$image";
}

function pathLink($link){
    return $_SERVER["REQUEST_URI"] == "/" ? "./$link" : "../$link";
}

if(isset($_GET["logout"])){
    $session = isset($_SESSION["admin_login"]) ? "admin_login" : "user_login";
    if($session){
        unset($_SESSION[$session]);
        msg("success","✅สำเร็จ","ออกจากระบบสำเร็จแล้ว","../");
    }
}

?>