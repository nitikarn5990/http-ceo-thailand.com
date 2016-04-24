<?php
// If they are saving the Information	



$now = DATE_TIME;
$start_date = strtotime($now);
$end_date = strtotime("+7 day", $start_date);
//echo date('Y-m-d', $start_date) . '  + 7 days =  ' . date('Y-m-d', $end_date);

$date1 = "2016-04-7 22:00:01";
$date2 = "2016-04-7 22:00:00";

 echo $functions->date_getFullTimeDifference($date1,$date2);





if ($_POST['submit_bt'] == 'บันทึกข้อมูล' || $_POST['submit_bt'] == 'บันทึกข้อมูล และแก้ไขต่อ') {
    if ($_POST['submit_bt'] == 'บันทึกข้อมูล') {

        $redirect = true;
    } else {
        $redirect = false;
    }

    $arrData = array();


    $arrData = $functions->replaceQuote($_POST);


    $member->SetValues($arrData);



    $member->SetValue('password', $functions->encode_login($_POST['password']));


    if ($member->GetPrimary() == '') {


        $member->SetValue('created_at', DATE_TIME);


        $member->SetValue('updated_at', DATE_TIME);
    } else {


        $member->SetValue('updated_at', DATE_TIME);
    }


    $member_parent = $functions->replaceQuote($_POST['member_name']);

    $member->SetValue('member_parent', json_encode($member_parent));
    //$member->updateSQL(array('member_parent' => json_encode($member_parent)), array('id' => $member->GetValue('id')));



    if ($member->Save()) {

        //  SetAlert('เพิ่ม แก้ไข ข้อมูลสำเร็จ', 'success');


        if (isset($_FILES['file_array'])) {

            $Allfile = "";

            $Allfile_ref = "";

            //loop file array
            for ($i = 0; $i < count($_FILES['file_array']['tmp_name']); $i++) {


                if ($_FILES["file_array"]["name"][$i] != "") {

                    $filename = $_FILES['file_array']['name'][$i];
                    $ext2 = pathinfo($filename, PATHINFO_EXTENSION);
                    $allowed = array('jpg', 'png', 'gif', 'jpeg');

                    if (in_array($ext2, $allowed)) {

                        $targetPath = DIR_ROOT_SLIDES . "/";

                        $ext = explode('.', $_FILES['file_array']['name'][$i]);
                        $extension = $ext[count($ext) - 1];


                        $rand = mt_rand(1, 100000);

                        $newImage = DATE_TIME_FILE . $rand . "." . $extension;

                        //   die();
                        $cdir = getcwd(); // Save the current directory


                        chdir($targetPath);


                        copy($_FILES['file_array']['tmp_name'][$i], $targetPath . $newImage);


                        chdir($cdir); // Restore the old working directory   
                        //$member->SetValue('member_file_name', $newImage);

                        $user_banner->SetValues(array());
                        $user_banner->SetValue('member_id', $member->GetValue('id'));
                        $user_banner->SetValue('image', $newImage);
                        $user_banner->SetValue('status', 'unclick');
                        $user_banner->SetValue('created_at', DATE_TIME);
                        $user_banner->SetValue('updated_at', DATE_TIME);

                        if ($user_banner->Save()) {

                            SetAlert('เพิ่ม แก้ไข ข้อมูลสำเร็จ', 'success');
                        } else {
                            SetAlert('ไม่สามารถเพิ่ม แก้ไข ข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
                        }
                    }
                }
            }
        }

        ////////


        if ($redirect) {


            header('location:' . ADDRESS_ADMIN_CONTROL . 'member');


            die();
        } else {


            header('location:' . ADDRESS_ADMIN_CONTROL . 'member&action=edit&id=' . $member->GetPrimary());


            die();
        }
    } else {


        SetAlert('ไม่สามารถเพิ่ม แก้ไข ข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
    }
}


// If Deleting the Page


if ($_GET['img_del_id'] != '') {


    $arrDel = array('id' => $_GET['img_del_id']);


    $user_banner->SetValues($arrDel);

    // Remove the info from the DB

    if ($user_banner->Delete()) {

        if (unlink(DIR_ROOT_SLIDES . $user_banner->GetValue('image'))) {

            //	fulldelete($location); 

            SetAlert('Delete Data Success', 'success');
        }

        // Set alert and redirect
        SetAlert('Delete Data Success', 'success');
        header('location:' . ADDRESS_ADMIN_CONTROL . 'member&action=edit&id=' . $_GET['id']);

        die();
    } else {


        SetAlert('ไม่สามารถลบข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
    }
}

if ($_GET['id'] != '' && $_GET['action'] == 'del') {


    // Get all the form data


    $arrDel = array('id' => $_GET['id']);


    $member->SetValues($arrDel);

    // Remove the info from the DB


    if ($member->Delete()) {

        if (unlink(DIR_ROOT_SLIDES . $member->GetValue('member_file_name'))) {

            //	fulldelete($location); 

            SetAlert('Delete Data Success', 'success');
        }

        // Set alert and redirect
        SetAlert('Delete Data Success', 'success');
        header('location:' . ADDRESS_ADMIN_CONTROL . 'member');

        die();
    } else {


        SetAlert('ไม่สามารถลบข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
    }
}


if ($_GET['id'] != '' && $_GET['action'] == 'edit') {


    // For Update


    $member->SetPrimary((int) $_GET['id']);


    // Try to get the information


    if (!$member->GetInfo()) {


        SetAlert('ไม่สามารถค้นหาข้อมูลได้ กรุณาลองใหม่อีกครั้ง');


        $member->ResetValues();
    }
}
?>
<?php if ($_GET['action'] == "add" || $_GET['action'] == "edit") { ?>
    <div class="row-fluid">
        <div class="span12">

            <div class="da-panel collapsible">
                <div class="da-panel-header"> <span class="da-panel-title"> <i class="icol-<?php echo ($member->GetPrimary() != '') ? 'application-edit' : 'add' ?>"></i> <?php echo ($member->GetPrimary() != '') ? 'แก้ไข' : 'เพิ่ม' ?> สมาชิก </span> </div>
                <div class="da-panel-content da-form-container">
                    <form id="validate" enctype="multipart/form-data" action="<?php echo ADDRESS_ADMIN_CONTROL ?>member<?php echo ($member->GetPrimary() != '') ? '&action=edit&id=' . $member->GetPrimary() : ''; ?>" method="post" class="da-form">
                        <?php if ($member->GetPrimary() != ''): ?>
                            <input type="hidden" name="id" value="<?php echo $member->GetPrimary() ?>" />
                            <input type="hidden" name="created_at" value="<?php echo $member->GetValue('created_at') ?>" />
                        <?php endif; ?>
                        <div class="da-form-inline">
                            <div class="da-form-row">
                                <div class="span6">
                                    <label class="da-form-label">Username : <span class="required"></span></label>
                                    <div class="da-form-item large">
                                        <input type="text" name="username" id="" value="<?php echo ($member->GetPrimary() != '') ? $member->GetValue('username') : ''; ?>" class="span12" />
                                    </div><br>
                                    <label class="da-form-label">Password : <span class="required"></span></label>
                                    <div class="da-form-item large">
                                        <input type="text" name="password" id="" value="<?php echo ($member->GetPrimary() != '') ? $functions->decode_login($member->GetValue('password')) : ''; ?>" class="span12" />
                                    </div>
                                </div>
                                <div class="span6">


                                    <label class="da-form-label"><i class="fa fa-money fa-2x"></i> ยอดเงิน : <span class="required"></span></label>
                                    <div class="da-form-item large">
                                        <input type="text" name="balance" id="" value="<?php echo ($member->GetPrimary() != '') ? $member->GetValue('balance') : '0'; ?>" class="span12"  data-validation="number"/>
                                    </div>
                                </div>
                            </div>
                            <div class="da-form-row">
                                <div class="span6">
                                    <label class="da-form-label">รหัสสมาชิก : <span class="required"></span></label>
                                    <div class="da-form-item large">
                                        <input type="text" name="member_id" id="" value="<?php echo ($member->GetPrimary() != '') ? $member->GetValue('member_id') : ''; ?>" class="span12" />
                                    </div><br>

                                </div>

                            </div>
                            <div class="da-form-row">
                                <div class="span6">
                                    <label class="da-form-label">ชื่อ-สกุล : <span class="required"></span></label>
                                    <div class="da-form-item large">
                                        <input type="text" name="name" id="" value="<?php echo ($member->GetPrimary() != '') ? $member->GetValue('name') : ''; ?>" class="span12" />
                                    </div><br>

                                </div>
                                <div class="span6">
                                    <label class="da-form-label">เบอร์โทร : <span class="required"></span></label>
                                    <div class="da-form-item large">
                                        <input type="text" name="tel" id="" value="<?php echo ($member->GetPrimary() != '') ? $member->GetValue('tel') : ''; ?>" class="span12" />
                                    </div>
                                </div>
                            </div>


                            <div class="da-form-row">

                                <div class="span6">

                                    <label class="da-form-label">โฆษณา</label>
                                    <div class="da-form-item large">

                                        <input type="file" name="file_array[]" id="image" multiple="" class="span12" accept="image/gif, image/jpeg, image/jpg, image/png" />


                                        <label class="help-block"> (รองรับ jpg, png, gif )</label>

                                    </div>
                                </div>
                                <div class="span6">

                                    <label class="da-form-label"><i class="fa fa-clock-o fa-2x "></i>  เวลาหาสมาชิก (วัน) :</label>
                                    <div class="da-form-item large">
                                        <input type="text" name="time_limit" id="" value="<?php echo ($member->GetPrimary() != '') ? $member->GetValue('time_limit') : ''; ?>" class="span12" data-validation="required,number"  placeholder="วัน"  />

                                    </div>

                                </div>
                            </div>
                            <div class="da-form-row">

                                <label class="da-form-label"> โฆษณาที่อัพโหลด</label>
                                <div class="da-form-item large">
                                    <?php
                                    if ($member->GetPrimary() != '') {
                                        $cnt = 1;
                                        $sqlImg = "SELECT * FROM " . $user_banner->getTbl() . " WHERE member_id = " . $member->GetPrimary();
                                        $queryImg = $db->Query($sqlImg);
                                        if ($db->NumRows($queryImg) > 0) {
                                            while ($row = $db->FetchArray($queryImg)) {
                                                ?>

                                                <p><?= $cnt++ ?>. <img src="<?= ADDRESS ?>img/<?= $row['image'] ?>" class="img-responsive" style="max-width: 50%;">
                                                    <a href="javascript:void(0)" class="btn btn-danger" onclick="if (confirm('คุณต้องการลบข้อมูลนี้หรือใม่?') == true) {
                                                                                document.location.href = '<?php echo ADDRESS_ADMIN_CONTROL ?>member&action=edit&id=<?= $member->GetPrimary() ?>&img_del_id=<?= $row['id'] ?>'
                                                                                        }">ลบ</a>
                                                </p>

                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                </div>

                            </div>

                            <div class="da-form-row">
                                <?php
                                if ($member->GetPrimary() != '') {
                                    $arr_member_parent = json_decode($member->GetValue('member_parent'));
                                }
                                ?>
                                <label class="da-form-label"><i class="fa fa-users fa-2x "></i> สมาชิกที่หาได้</label>
                                <div class="da-form-item large" id="">
                                    <label class="span1">1.</label>  
                                    <input type="text" name="member_name[]" value="<?php echo ($member->GetPrimary() != '') ? $arr_member_parent[0] : ''; ?>" class="span6" data-validation=""/>

                                </div><br>
                                <div class="da-form-item large" id="">
                                    <label class="span1 ">2.</label>  
                                    <input type="text" name="member_name[]" value="<?php echo ($member->GetPrimary() != '') ? $arr_member_parent[1] : ''; ?>" class="span6" data-validation=""/>

                                </div><br>
                                <div class="da-form-item large" id="">
                                    <label class="span1">3.</label>  

                                    <input type="text" name="member_name[]" value="<?php echo ($member->GetPrimary() != '') ? $arr_member_parent[2] : ''; ?>" class="span6" data-validation=""/>

                                </div>
                            </div>
                            <div class="da-form-row">
                                <label class="da-form-label"><i class="fa fa-commenting-o fa-2x "></i> หมายเหตุ : <span class="required"></span></label>
                                <div class="da-form-item large">
                                    <textarea rows="12" class="span12" name="comment"><?php echo ($member->GetPrimary() != '') ? $member->GetValue('comment') : ''; ?></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="btn-row">
                            <input type="submit" name="submit_bt" value="บันทึกข้อมูล" class="btn btn-success" />
                            <input type="submit" name="submit_bt" value="บันทึกข้อมูล และแก้ไขต่อ" class="btn btn-primary" />
                            <a href="<?php echo ADDRESS_ADMIN_CONTROL ?>member" class="btn btn-danger">ยกเลิก</a> </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="row-fluid">
        <div class="span12">
            <?php
            // Report errors to the user


            Alert(GetAlert('error'));


            Alert(GetAlert('success'), 'success');
            ?>
            <div class="da-panel collapsible">
                <div class="da-panel-header"> <span class="da-panel-title"> <i class="icol-grid"></i>สมาชิก ทั้งหมด </span> </div>
                <div class="da-panel-toolbar">
                    <div class="btn-toolbar">
                        <div class="btn-group"> <a class="btn" href="<?php echo ADDRESS_ADMIN_CONTROL ?>member&action=add"><i class="icol-add"></i> เพิ่มข้อมูล</a> </div>
                    </div>
                </div>
                <div class="da-panel-content da-table-container">
                    <table id="da-ex-datatable-sort" class="da-table" sort="0" order="asc" width="1000">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>รหัสสมาชิก</th>
                                <th>ชื่อ</th>
                                <th>เบอร์โทร</th>

                                <th>แก้ไขล่าสุด</th>
                                <th>ตัวเลือก</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM " . $member->getTbl();


                            $query = $db->Query($sql);

                            if ($db->NumRows($query) > 0) {
                                while ($row = $db->FetchArray($query)) {
                                    ?>
                                    <tr>
                                        <td class="center" width="15"><?php echo $row['id']; ?></td>
                                        <td  class="center" width=""><?php echo $row['member_id']; ?></td>
                                        <td  width=""><?php echo $row['name']; ?></td>
                                        <td class="center" width=""><?php echo $row['tel']; ?></td>
                                        <td class="center" width=""><?php echo $functions->ShowDateThTime($row['updated_at']) ?></td>

                                        <td class="center"  width=""><a href="<?php echo ADDRESS_ADMIN_CONTROL ?>member&action=edit&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-small">แก้ไข / ดู</a> <a href="#" onclick="if (confirm('คุณต้องการลบข้อมูลนี้หรือใม่?') == true) {
                                                                document.location.href = '<?php echo ADDRESS_ADMIN_CONTROL ?>member&action=del&id=<?php echo $row['id'] ?>'
                                                                        }" class="btn btn-danger btn-small">ลบ</a></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<style>


    /*Colored Label Attributes*/


    .label {


        background-color: #BFBFBF;


        border-bottom-left-radius: 3px;


        border-bottom-right-radius: 3px;


        border-top-left-radius: 3px;


        border-top-right-radius: 3px;


        color: #FFFFFF;


        font-size: 9.75px;


        font-weight: bold;


        padding-bottom: 2px;


        padding-left: 4px;


        padding-right: 4px;


        padding-top: 2px;


        text-transform: uppercase;


        white-space: nowrap;


    }





    .label:hover {


        opacity: 80;


    }





    .label.success {


        background-color: #46A546;


    }


    .label.success2 {


        background-color: #CCC;


    }


    .label.success3 {


        background-color: #61a4e4;





    }





    .label.warning {


        background-color: #FC9207;


    }





    .label.failure {


        background-color: #D32B26;


    }





    .label.alert {


        background-color: #33BFF7;


    }





    .label.good-job {


        background-color: #9C41C6;


    }








</style>
<script>
// Add custom validation rule
//    $.formUtils.addValidator({
//        name: 'trim',
//        validatorFunction: function (value, $el, config, language, $form) {
//            if ($.trim(value)  === null || $.trim(value) === "") {
//                return false;
//            }else{
//                 return true;
//            }
//            
//        },
//        errorMessage: 'You have to answer with an even number',
//        errorMessageKey: ''
//    }); 
</script>
