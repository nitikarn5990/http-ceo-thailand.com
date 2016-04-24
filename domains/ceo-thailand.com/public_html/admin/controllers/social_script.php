<?php
// If they are saving the Information	
if ($_POST['submit_bt'] == 'บันทึกข้อมูล' || $_POST['submit_bt'] == 'บันทึกข้อมูล และแก้ไขต่อ') {


    $arrData = array();
    $arrData = $functions->replaceQuote($_POST);
    $social_script->SetValues($arrData);

    if ($social_script->Save()) {
        SetAlert('เพิ่ม แก้ไข ข้อมูลสำเร็จ', 'success');


        header('location:' . ADDRESS_ADMIN_CONTROL . 'social_script&action=edit&id=' . $social_script->GetPrimary());
        die();
    } else {
        SetAlert('ไม่สามารถเพิ่ม แก้ไข ข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
    }
}

if ($_GET['id'] != '' && $_GET['action'] == 'edit') {
    // For Update
    $social_script->SetPrimary((int) $_GET['id']);
    // Try to get the information
    if (!$social_script->GetInfo()) {
        SetAlert('ไม่สามารถค้นหาข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
        $social_script->ResetValues();
    }
}
?>
<?php if ($_GET['mode'] == "" && $_GET['action'] == "edit") { ?>
    <div class="row-fluid">
        <div class="span12">
    <?php
    // Report errors to the user
    Alert(GetAlert('error'));
    Alert(GetAlert('success'), 'success');
    ?>
            <div class="da-panel collapsible">
                <div class="da-panel-header"> <span class="da-panel-title"> <i class="icol-<?php echo ($social_script->GetPrimary() != '') ? 'application-edit' : 'add' ?>"></i> <?php echo ($social_script->GetPrimary() != '') ? 'แก้ไข' : 'แก้ไข' ?> รายละเอียด Social Script </span> </div>
                <div class="da-panel-content da-form-container">
                    <form id="validate" enctype="multipart/form-data" action="<?php echo ADDRESS_ADMIN_CONTROL ?>social_script<?php echo ($social_script->GetPrimary() != '') ? '&action=edit&id=' . $social_script->GetPrimary() : ''; ?>" method="post" class="da-form">
    <?php if ($social_script->GetPrimary() != ''): ?>
                            <input type="hidden" name="id" value="<?php echo $social_script->GetPrimary() ?>" />

                        <?php endif; ?>
                        <div class="da-form-inline">
                            <div class="da-form-row">
                                <label class="da-form-label"> Preview <span class="required">*</span></label>
                                <div class="da-form-item large">
    <?php echo ($social_script->GetPrimary() != '') ? $social_script->GetValue('sc_youtube') : ''; ?>

                                </div>
                                <p>&nbsp;</p>
                                <label class="da-form-label"><img src="images/icon-youtube.png" /> สคริป Youtube <span class="required">*</span></label>
                                <div class="da-form-item large">

                                    <textarea  name="sc_youtube" id="" class="span12 required"><?php echo ($social_script->GetPrimary() != '') ? $social_script->GetValue('sc_youtube') : ''; ?></textarea>
                                </div>
                            </div>
                            <div class="da-form-row">
                                <label class="da-form-label"> Preview <span class="required">*</span></label>
                                <div class="da-form-item large">
    <?php echo ($social_script->GetPrimary() != '') ? $social_script->GetValue('sc_tripadvisor') : ''; ?>

                                </div>
                                 <p>&nbsp;</p>
                                <label class="da-form-label"><img src="images/icon-tripadvisor.jpg" style="width: 32px;height: 32px;"/> สคริป Tripadvisor <span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <textarea  name="sc_tripadvisor" id="" class="span12 required"><?php echo ($social_script->GetPrimary() != '') ? $social_script->GetValue('sc_tripadvisor') : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="btn-row">

                            <input type="submit" name="submit_bt" value="บันทึกข้อมูล และแก้ไขต่อ" class="btn btn-primary" />

                    </form>
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