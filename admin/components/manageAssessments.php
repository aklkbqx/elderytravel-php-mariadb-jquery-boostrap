<div class='d-flex justify-content-between'>
    <h4>จัดการแบบประเมิน</h4>
    <button type='button' data-bs-target='#addAssessment' data-bs-toggle='modal' class='btn btn-primary'>เพิ่มแบบประเมิน</button>

    <div class="modal fade" id='addAssessment'>
        <div class="modal-dialog modal-dialog-centered ">
            <form id='form-assessments' method="post" action="../api/admin/manageAssessments.php" class="modal-content overflow-hidden">

                <div class="modal-header">
                    <h4>เพิ่มแบบประเมิน/สอบถาม</h4>
                    <button type="button" data-bs-dismiss='modal' class='btn-close'></button>
                </div>

                <div class="modal-body overflow-auto" style='max-height:800px'>
                    <div class='form-floating'>
                        <input type="text" name='title' class='form-control' placeholder="หัวข้อ"> 
                        <label for="หัวข้อ">หัวข้อ</label>
                    </div>
                    
                    <div class='form-floating'>
                        <textarea name='description' class='form-control mt-2' placeholder='รายละเอียด' style='min-height:150px'></textarea>
                        <label for="รายละเอียด">รายละเอียด</label>
                    </div>

                    <h4 class='my-2'>คำถาม</h4>

                    <div id='question-box'>
                        <div class='d-flex gap-2 align-items-center mb-2'>
                            <h6>1</h6> 
                            <input type="text" name='q-1' class='form-control' placeholder='คำถาม'>
                            <button type="button" class="btn-remove btn btn-danger" hidden>ลบ</button>
                        </div>
                    </div>

                    <button type='button' id='addQuestion' class='btn btn-outline-primary w-100 my-2'>เพิ่มคำถาม</button> 
                </div>

                <div class="modal-footer">
                    <div class='d-flex w-100 gap-2'>
                        <button type='reset' data-bs-dismiss='modal' class='btn btn-light w-100'>ยกเลิก</button>
                        <button type='submit' name='addAssessment' class='btn btn-primary w-100'>ยืนยันการเพิ่ม</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php 
    $fetchassessments = sql("SELECT * FROM assessments");
    if($fetchassessments->rowCount() > 0){ ?>
        <div class="border border-bottom-0 rounded-4 overflow-hidden mt-2">
            <table class='table m-0 table-striped align-middle'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>หัวข้อ</th>
                        <th>รายละเอียด</th>
                        <th>จำนวนคนตอบกลับ</th>
                        <th>จำนวนผู้เข้าชม</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($assessment = $fetchassessments->fetch()){ ?>
                        <tr>
                            <td><?= $assessment["a_id"] ?></td>
                            <td><?= $assessment["title"] ?></td>
                            <td><?= $assessment["description"] ?></td>
                            <td><?= sql("SELECT COUNT(*) as count FROM assessment_responses WHERE a_id = ?",[$assessment["a_id"]])->fetch()["count"] ?></td>
                            <td><?= sql("SELECT COUNT(*) as count FROM assessment_visitors WHERE a_id = ?",[$assessment["a_id"]])->fetch()["count"] ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <button type="button" data-bs-toggle="modal" class="btn btn-primary w-100" data-bs-target="#reportAssessment<?= $assessment["a_id"] ?>">ดูรายงาน</button>

                                    <div class="modal fade" id='reportAssessment<?= $assessment["a_id"] ?>'>
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                            <div class="modal-content overflow-hidden">

                                                <div class="modal-header">
                                                    <h4>การตอบกลับของแบบสอบ/รายงาน</h4>
                                                    <button type="button" data-bs-dismiss='modal' class='btn-close'></button>
                                                </div>

                                                <div class="modal-body overflow-auto" style='max-height:800px'>
                                                    <h5>
                                                        <?= $assessment["title"] ?>
                                                    </h5>
                                                    <div>
                                                        <?= $assessment["description"] ?>
                                                    </div>
                                                    <ul class='mt-2'>
                                                        <li class='text-primary'><div data-bs-toggle="modal" data-bs-target="#seeAssessmentResponse<?= $assessment["a_id"] ?>" class='text-decoration-underline pointer '>จำนวนคนตอบกลับ: <?= sql("SELECT COUNT(*) as count FROM assessment_responses WHERE a_id = ?",[$assessment["a_id"]])->fetch()["count"] ?></div></li>
                                                        <li class='text-primary'>จำนวนผู้เข้าชม: <?= sql("SELECT COUNT(*) as count FROM assessment_visitors WHERE a_id = ?",[$assessment["a_id"]])->fetch()["count"] ?></li>
                                                   </ul>

                                                   <?php 
                                                   $fetchAssessmentsResponses = sql("SELECT * FROM assessment_responses JOIN assessments ON assessment_responses.a_id = assessments.a_id WHERE assessments.a_id = ?",[$assessment["a_id"]]); 
                                                   while($response = $fetchAssessmentsResponses->fetch()){
                                                        
                                                   }
                                                   ?>
                                                </div>

                                                <div class="modal-footer">
                                                    <div class='d-flex w-100 gap-2'>
                                                        <button type='reset' data-bs-dismiss='modal' class='btn btn-light w-100'>ปิด</button>
                                                        <a href="report.php?a_id=<?= $assessment["a_id"]; ?>" class='btn btn-primary w-100'>พิมพ์รายงาน</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id='seeAssessmentResponse<?= $assessment["a_id"] ?>'>
                                        <div class="modal-dialog modal-dialog-centered modal-xl modal-scrollable">
                                            <div class="modal-content overflow-hidden">

                                                <div class="modal-header">
                                                    <h4>การตอบกลับแบบประเมิน/สอบถาม</h4>
                                                    <button type="button" data-bs-dismiss='modal' class='btn-close'></button>
                                                </div>

                                                <div class="modal-body overflow-auto" style='max-height:800px'>

                                                    <div class='table-responsive'>
                                                        <table class="table table-boredered">
                                                            <thead>
                                                                <tr>
                                                                    <th>ผู้ตอบกลับ</th>
                                                                    <?php $fetchquestions = sql("SELECT * FROM assessments WHERE a_id = ?",[$assessment["a_id"]]);
                                                                    while($question = $fetchquestions->fetch()){
                                                                        foreach(json_decode($question["questions"]) as $index=>$q){ ?>
                                                                            <th class="text-center">
                                                                                <?= $q; ?>
                                                                            </th>
                                                                        <?php };
                                                                    } ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $fetchResponses = sql("SELECT * FROM assessment_responses JOIN users ON assessment_responses.user_id = users.user_id WHERE assessment_responses.a_id = ?",[$assessment["a_id"]]);
                                                                while($response = $fetchResponses->fetch()){ ?>
                                                                    <tr>
                                                                        <td>
                                                                            <div class='d-flex align-items-center gap-2'>
                                                                                <img src="<?= pathImage($response["image"],"user_images"); ?>" class="rounded-circle overflow-hidden border" style='width:50px;height:50px'>
                                                                                <h6><?= $response["firstname"] ?> <?= $response["lastname"] ?></h6>
                                                                            </div>
                                                                        </td>
                                                                        <?php foreach(json_decode($response["responses"]) as $index=>$r){ ?>
                                                                            <td class="text-center"><?= $r ?></td>
                                                                        <?php } ?>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
 
                                                </div>

                                                <div class="modal-footer">
                                                    <div class='d-flex w-100 gap-2'>
                                                        <button type='button' data-bs-toggle="modal" data-bs-target='#reportAssessment<?= $assessment["a_id"] ?>' class='btn btn-light w-100'>ย้อนกลับ</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <button type="button" data-bs-toggle="modal" class="btn btn-warning w-100" data-bs-target="#editAssessment<?= $assessment["a_id"] ?>">แก้ไข</button>

                                    <div class="modal fade" id='editAssessment<?= $assessment["a_id"] ?>'>
                                        <div class="modal-dialog modal-dialog-centered ">
                                            <form id='form-assessments' method="post" action="../api/admin/manageAssessments.php?a_id=<?= $assessment["a_id"]; ?>" class="modal-content overflow-hidden">

                                                <div class="modal-header">
                                                    <h4>แก้ไขแบบประเมิน/สอบถาม</h4>
                                                    <button type="button" data-bs-dismiss='modal' class='btn-close'></button>
                                                </div>

                                                <div class="modal-body overflow-auto" style='max-height:800px'>
                                                    <div class='form-floating'>
                                                        <input type="text" name='title' class='form-control' placeholder="หัวข้อ" value="<?= $assessment["title"] ?>"> 
                                                        <label for="หัวข้อ">หัวข้อ</label>
                                                    </div>
                                                    
                                                    <div class='form-floating'>
                                                        <textarea name='description' class='form-control mt-2' placeholder='รายละเอียด' style='min-height:150px'><?= $assessment["description"] ?></textarea>
                                                        <label for="รายละเอียด">รายละเอียด</label>
                                                    </div>

                                                    <h4 class='my-2'>คำถาม</h4>

                                                    <?php foreach(json_decode($assessment["questions"]) as $index=>$question){ ?>
                                                        <div class='d-flex gap-2 align-items-center mb-2'>
                                                            <h6><?= explode("-",$index)[1] ?></h6> 
                                                            <input type="text" name='<?= $index ?>' class='form-control' placeholder='คำถาม' value="<?= $question ?>">
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="modal-footer">
                                                    <div class='d-flex w-100 gap-2'>
                                                        <button type='reset' data-bs-dismiss='modal' class='btn btn-light w-100'>ยกเลิก</button>
                                                        <button type='submit' name='editAssessment' class='btn btn-warning w-100'>ยืนยันการแก้ไข</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#deleteAssessment<?= $assessment["a_id"] ?>">ลบ</button>

                                    <div class="modal fade" id='deleteAssessment<?= $assessment["a_id"] ?>'>
                                        <div class="modal-dialog modal-dialog-centered ">
                                            <form id='form-assessments' method="post" action="../api/admin/manageAssessments.php?a_id=<?= $assessment["a_id"]; ?>" class="modal-content overflow-hidden">

                                                <div class="modal-header">
                                                    <h4>ลบแบบประเมิน/สอบถาม ID <?= $assessment["a_id"] ?></h4>
                                                    <button type="button" data-bs-dismiss='modal' class='btn-close'></button>
                                                </div>

                                                <div class="modal-body overflow-auto" style='max-height:800px'>
                                                   <h4 class='text-center'>คุณแน่ใจที่จะทำการลบแบบประเมินนี้หรือไม่?</h4>
                                                   <p class='text-danger text-center'>การตอบกลับของแบบสอบถามนี้ทั้งหมดจะถูกลบออกเช่นกัน</p>
                                                </div>

                                                <div class="modal-footer">
                                                    <div class='d-flex w-100 gap-2'>
                                                        <button type='reset' data-bs-dismiss='modal' class='btn btn-light w-100'>ยกเลิก</button>
                                                        <button type='submit' name='deleteAssessment' class='btn btn-danger w-100'>ยืนยันการลบ</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } else{ ?>
        <div class="d-flex justify-content-center mt-5">
            <h5 class="text-muted">ยังไม่มีแบบประเมินในขณะนี้...</h5>
        </div>
    <?php }
?>

