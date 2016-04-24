<?php
// If they are saving the Information	





if ($_POST['submit_bt'] == 'บันทึกข้อมูล' || $_POST['submit_bt'] == 'บันทึกข้อมูล และแก้ไขต่อ') {


    if ($_POST['submit_bt'] == 'บันทึกข้อมูล') {


        $redirect = true;
    } else {


        $redirect = false;
    }


    $arrData = array();


    $arrData = $functions->replaceQuote($_POST);




    $text_slide->SetValues($arrData);



    if ($text_slide->GetPrimary() == '') {


        $text_slide->SetValue('created_at', DATE_TIME);


        $text_slide->SetValue('updated_at', DATE_TIME);
    } else {


        $text_slide->SetValue('updated_at', DATE_TIME);
    }


    //	$text_slide->Save();


    if ($text_slide->Save()) {


        SetAlert('เพิ่ม แก้ไข ข้อมูลสำเร็จ', 'success');


        //Redirect if needed

        if (isset($_FILES['file_array'])) {


            $Allfile = "";


            $Allfile_ref = "";


            for ($i = 0; $i < count($_FILES['file_array']['tmp_name']); $i++) {


                if ($_FILES["file_array"]["name"][$i] != "") {


                    unset($arrData['webs_money_image']);
                    $targetPath = DIR_ROOT_GALLERY . "/";

                    $newImage = DATE_TIME_FILE . "_" . $_FILES['file_array']['name'][$i];


                    $cdir = getcwd(); // Save the current directory


                    chdir($targetPath);


                    copy($_FILES['file_array']['tmp_name'][$i], $targetPath . $newImage);

                    chdir($cdir); // Restore the old working directory   


                    $text_slide->SetValue('file_name', $newImage);

                    if ($_POST['alt_tag'][$i] == '') {

                        //$Allfile_ref .= "|_|" . $newImage;
                        //$text_slide->SetValue('file_name', substr($Allfile, 3));


                        $text_slide->SetValue('alt_tag', $newImage);
                    } else {


                        //$Allfile_ref .= "|_|" .   $functions->seoTitle($_POST['alt_tag'][$i]);


                        $text_slide->SetValue('alt_tag', $functions->seoTitle($_POST['alt_tag'][$i]));
                    }


                    $text_slide->SetValue('text_slide_id', $text_slide->GetPrimary());


                    //$text_slide->Save();


                    if ($text_slide->Save()) {

                        //SetAlert('เพิ่ม แก้ไข ข้อมูลสำเร็จ','success');


                        $text_slide->ResetValues();
                    } else {


                        SetAlert('ไม่สามารถเพิ่ม แก้ไข ข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
                    }
                }
            }
        }


        ////////

        if ($redirect) {


            header('location:' . ADDRESS_ADMIN_CONTROL . 'text_slide');


            die();
        } else {


            header('location:' . ADDRESS_ADMIN_CONTROL . 'text_slide&action=edit&id=' . $text_slide->GetPrimary());


            die();
        }
    } else {


        SetAlert('ไม่สามารถเพิ่ม แก้ไข ข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
    }
}


if ($_GET['id'] != '' && $_GET['action'] == 'edit') {


    // For Update


    $text_slide->SetPrimary((int) $_GET['id']);


    // Try to get the information


    if (!$text_slide->GetInfo()) {


        SetAlert('ไม่สามารถค้นหาข้อมูลได้ กรุณาลองใหม่อีกครั้ง');


        $text_slide->ResetValues();
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
                <div class="da-panel-header"> <span class="da-panel-title"> <i class="icol-<?php echo ($text_slide->GetPrimary() != '') ? 'application-edit' : 'add' ?>"></i> <?php echo ($text_slide->GetPrimary() != '') ? 'แก้ไข' : 'เพิ่ม' ?> รายละเอียดหน้าแรก </span> </div>
                <div class="da-panel-content da-form-container">
                    <form id="validate" enctype="multipart/form-data" action="<?php echo ADDRESS_ADMIN_CONTROL ?>text_slide<?php echo ($text_slide->GetPrimary() != '') ? '&id=' . $text_slide->GetPrimary() : ''; ?>" method="post" class="da-form">
    <?php if ($text_slide->GetPrimary() != ''): ?>
                            <input type="hidden" name="id" value="<?php echo $text_slide->GetPrimary() ?>" />
                            <input type="hidden" name="created_at" value="<?php echo $text_slide->GetValue('created_at') ?>" />
    <?php endif; ?>
                        <div class="da-form-inline">
                          
                            <div class="da-form-row">
                                <label class="da-form-label">ข้อความ <span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <input type="text" name="title" id="title" value="<?php echo ($text_slide->GetPrimary() != '') ? $text_slide->GetValue('title') : ''; ?>" class="span12 required">
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
