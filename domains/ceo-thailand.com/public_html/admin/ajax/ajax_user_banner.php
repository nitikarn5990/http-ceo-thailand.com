<?php
include_once ($_SERVER ["DOCUMENT_ROOT"] . '/lib/application.php');
$arrData = array(
    'status' => 'click',
    'current_show' => '',
    'updated_at' => DATE_TIME
);

$arrConID = array(
    'id' =>  $functions->decode_login($_GET['id'])
);

if ($user_banner->updateSQL($arrData, $arrConID)) {
    echo 'success';
} else {
    echo 'error';
}
?>