

<?php echo $detail = str_replace("../files", "../../files", $home_banner->getDataDesc("detail", "id = 6 AND status = 'ใช้งาน'")); ?>



<?php
if ($_POST['btn_submit'] == 'Submit') {
    SetAlert('ข้อมูลได้ถูกส่งแล้ว', 'success');

    Alert(GetAlert('error'));
    Alert(GetAlert('success'), 'success');
}
?>
<form action="" method="post" class="basic-grey">
    <h1>กรอกข้อมูล <?= $home_banner->getDataDesc("name", "id = 6 AND status = 'ใช้งาน'") ?>
        <span></span>
    </h1>
    <label>
        <span>ชื่อ-สกุล :</span>
        <input id="name" type="text" name="name" placeholder="" required=""/>
    </label>

    <label>
        <span>ที่อยู่ :</span>
        <input id="email" type="text" name="email" placeholder="" required=""/>
    </label>

    <label>
        <span>เบอร์โทร :</span>
        <input id="email" type="text" name="email" placeholder="" required=""/>
    </label> 
    <label>
        <span>เครือข่าย :</span>
        <input id="email" type="text" name="email" placeholder="" />
    </label>
    <label>
        <span>รหัสประจำตัวของสมาชิก  :</span>
        <input id="email" type="text" name="email" placeholder="" required=""/>
    </label> 
    <label>
        <span>E-mail  :</span>
        <input id="email" type="email" name="email" placeholder="" required=""/>
    </label> 

    <label>
        <span>&nbsp;</span> 
        <input type="submit" class="classname" name="btn_submit" value="Submit" /> 
    </label>    
</form>