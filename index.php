<?php
require_once "config.php";
require_once "util/link.php";

if(isset($_SESSION["user_login"])){
    $row = sql("SELECT * FROM users WHERE user_id = ?",[$_SESSION["user_login"]])->fetch();
}elseif(isset($_SESSION["admin_login"])){
    msg("warning","⚠คำเตือน","ไม่สามารถเข้าถึงหน้านี้ได้","./admin/");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eldery Travel</title>
</head>
<body class='bg-light'>

    <?php require_once "./components/nav.php"; ?>

    <?php require_once "./components/chat.php"; ?>

    <?php 
    if(isset($_SESSION["user_login"])){ ?>
    <div class='container' style='margin-top:7rem'>
        <h3>แบบประเมิน</h3>
        
       <div class='d-flex flex-column align-items-start mt-2'>
        <?php 
            $fetch_assessment = sql("SELECT * FROM assessments");
           
            while($assessment = $fetch_assessment->fetch()){
                $check = sql("SELECT * FROM assessment_responses WHERE user_id = ? AND a_id = ?",[$row["user_id"],$assessment["a_id"]])->fetch();
                 ?>

                <button onclick='$.ajax({url: "api/assessment.php?addVisit&a_id=<?= $assessment["a_id"]; ?>",type: "POST",success: (data) =>{console.log(data)}})' class="btn btn-light text-start position-relative <?= $check ? "disabled" : "" ?>" data-bs-toggle="modal" data-bs-target="#assessment-<?= $assessment["a_id"]; ?>">
                    <h6><?= $assessment["title"]; ?></h6>
                    <p><?= $assessment["description"]; ?></p>
                    <?php if($check){ ?>
                        <div class='position-absolute top-0 start-100'>
                            <span class="badge text-bg-success">ทำแล้ว</span>
                        </div>
                    <?php } ?>
                </button>

                <div class="modal fade" id='assessment-<?= $assessment["a_id"]; ?>'>
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <form id="form-a_id-<?= $assessment["a_id"]; ?>" method="post" action="api/assessment.php?a_id=<?= $assessment["a_id"]; ?>" class="modal-content overflow-hidden">

                            <div class="modal-header">
                                <h4>แบบประเมิน/สอบถาม</h4>
                                <button type="button" data-bs-dismiss='modal' class='btn-close'></button>
                            </div>

                            <div class="modal-body overflow-auto" style='max-height:800px'>
                                <h4><?= $assessment["title"]; ?></h4>
                                <p><?= $assessment["description"]; ?></p>

                                <table class='table table-striped table-responsive'> 
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <?php foreach($assessmentResponseRating as $assessIndex=>$assessInput){ ?><th class='text-center'><?= $assessIndex; ?></th><?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $question = json_decode($assessment["questions"]);
                                        foreach($question as $index=>$q){ ?>
                                        <tr>
                                            <td><?= $q; ?></td>
                                            <?php foreach($assessmentResponseRating as $assessIndex=>$assessInput){ ?>
                                                <td>
                                                   <div class='d-flex justify-content-center'>
                                                    <label for="<?= $assessment["a_id"] ?>-<?= $index;?>-<?= $assessIndex; ?>" class='btn btn-outline-light border-0'>
                                                            <input id="<?= $assessment["a_id"] ?>-<?= $index;?>-<?= $assessIndex; ?>" type="radio" value="<?= $assessInput; ?>" name="<?= $index; ?>" class="form-check-input">
                                                        </label>
                                                   </div>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php }
                                    ?>
                                    </tbody>
                                </table>

                                
                                
                            </div>

                            <div class="modal-footer">
                                <div class='d-flex w-100 gap-2'>
                                    <button type='reset' data-bs-dismiss='modal' class='btn btn-light w-100'>ยกเลิก</button>
                                    <button type='submit' name='sendAssessment' class='btn btn-primary w-100'>ยืนยันการส่ง</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php } ?>
       </div>  
    </div>
    <?php } ?>

</body>
</html>