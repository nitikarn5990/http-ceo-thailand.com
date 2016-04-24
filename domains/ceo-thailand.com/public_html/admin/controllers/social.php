<?php
// If they are saving the Information	
if ($_POST['submit_bt'] == 'บันทึกข้อมูล' || $_POST['submit_bt'] == 'บันทึกข้อมูล และแก้ไขต่อ') {

  
    $arrData = array();
    $arrData = $functions->replaceQuote($_POST);
    $social->SetValues($arrData);

    if ($social->Save()) {
        SetAlert('เพิ่ม แก้ไข ข้อมูลสำเร็จ', 'success');
   
       
            header('location:' . ADDRESS_ADMIN_CONTROL . 'social&action=edit&id=' . $social->GetPrimary());
            die();
        
    } else {
        SetAlert('ไม่สามารถเพิ่ม แก้ไข ข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
    }
}

if ($_GET['id'] != '' && $_GET['action'] == 'edit') {
    // For Update
    $social->SetPrimary((int) $_GET['id']);
    // Try to get the information
    if (!$social->GetInfo()) {
        SetAlert('ไม่สามารถค้นหาข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
        $social->ResetValues();
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
                <div class="da-panel-header"> <span class="da-panel-title"> <i class="icol-<?php echo ($social->GetPrimary() != '') ? 'application-edit' : 'add' ?>"></i> <?php echo ($social->GetPrimary() != '') ? 'แก้ไข' : 'แก้ไข' ?> รายละเอียด Social Media </span> </div>
                <div class="da-panel-content da-form-container">
                    <form id="validate" enctype="multipart/form-data" action="<?php echo ADDRESS_ADMIN_CONTROL ?>social<?php echo ($social->GetPrimary() != '') ? '&action=edit&id=' . $social->GetPrimary() : ''; ?>" method="post" class="da-form">
    <?php if ($social->GetPrimary() != ''): ?>
                            <input type="hidden" name="id" value="<?php echo $social->GetPrimary() ?>" />
                    
    <?php endif; ?>
                        <div class="da-form-inline">
                          
                            <div class="da-form-row">
                                <label class="da-form-label"><img src="images/icon-fb.png" /> Facebook <span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <input type="text" name="s_fb" id="" value="<?php echo ($social->GetPrimary() != '') ? $social->GetValue('s_fb') : ''; ?>" class="span12 required">
                                    <label class="help-block">ไม่ต้องใส่ https://</label>
                                </div>
                            </div>
                              <div class="da-form-row">
                                <label class="da-form-label"><img src="images/icon-tw.png" /> Twitter <span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <input type="text" name="s_twitter" id="" value="<?php echo ($social->GetPrimary() != '') ? $social->GetValue('s_twitter') : ''; ?>" class="span12 required">
                                    <label class="help-block">ไม่ต้องใส่ https://</label>    
                                </div>
                            </div>
                                   <div class="da-form-row">
                                <label class="da-form-label"><img src="images/icon-youtube.png" /> Youtube <span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <input type="text" name="s_youtube" id="" value="<?php echo ($social->GetPrimary() != '') ? $social->GetValue('s_youtube') : ''; ?>" class="span12 required">
                                    <label class="help-block">ไม่ต้องใส่ https://</label>
                                </div>
                            </div>
                                   <div class="da-form-row">
                                <label class="da-form-label"><img src="images/icon-email.png" /> Email <span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <input type="email" name="s_email" id="" value="<?php echo ($social->GetPrimary() != '') ? $social->GetValue('s_email') : ''; ?>" class="span12 required">
                                    <label class="help-block"></label>
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