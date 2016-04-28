<?php

include_once ($_SERVER ["DOCUMENT_ROOT"] . '/lib/application.php');

if ($_GET['day'] != '') {

    $start_date = strtotime(DATE_TIME);
    $end_date_at = date('Y-m-d 00:00:00', strtotime("+7 day", $start_date));

    //  $member->SetValue('end_date_at', $end_date_at);
    $arrData = array(
        'end_date_at' => $end_date_at,
        'updated_at' => DATE_TIME
    );
    $arrConID = array(
        'id' => $_SESSION['admin_id']
    );

   
    $member->SetPrimary((int) $_SESSION['admin_id']);
    $member->GetInfo();

    //Set ภาพโฆษณา เริ่มต้น
    //$member->SetPrimary((int) $_SESSION['admin_id']);
    //$member->GetInfo();
    $user_banner->updateSQL(array('current_show'=>''), array('member_id'=> $_SESSION['admin_id']));
    if ($user_banner->CountDataDesc('id', 'member_id = ' . $member->GetValue('id') . ' AND current_show = 1') < $member->GetValue('number_of_ad')) {

        //keep all id 
        $arrayKey = array();
        $sql = "SELECT * FROM " . $user_banner->getTbl() . " WHERE member_id = " . $member->GetValue('id') . "  AND status = 'unclick'";
        $query = $db->Query($sql);
        if ($db->NumRows($query) > 0) {

            while ($row = $db->FetchArray($query)) {
                $arrayKey[] = $row['id'];
            }

            $cnt_id = 0;
            $adID = '';
            foreach ($functions->ArrayRandom($arrayKey) as $key => $val) {
                if ($cnt_id < $member->GetValue('number_of_ad')) {
                    $adID .= ',' . $val;
                    $cnt_id++;
                }
            }

            $arrForRandom = explode(',', substr($adID, 1));
            foreach ($arrForRandom as $val_id) {
                //
                $sqlImg = "SELECT * FROM " . $user_banner->getTbl() . " WHERE id = " . $val_id . "  AND status = 'unclick'";
                $queryImg = $db->Query($sqlImg);

                if ($db->NumRows($queryImg) > 0) {
                    while ($row = $db->FetchArray($queryImg)) {
                        $user_banner->updateSQL(array('current_show' => '1'), array('id' => $row['id']));
                    }
                }
            }
        }
    }

    ////////
    //เปลี่ยนทุกๆ 7 วัน
//    $number_of_ad = $member->getDataDesc('number_of_ad', 'id = ' . $_SESSION['admin_id']);
//
//    //keep all id 
//    $arrayKey = array();
//    $sql = "SELECT * FROM " . $user_banner->getTbl() . " WHERE member_id = " . $_SESSION['admin_id'] . "  AND status = 'unclick'";
//    $query = $db->Query($sql);
//    if ($db->NumRows($query) > 0) {
//        while ($row = $db->FetchArray($query)) {
//            $arrayKey[] = $row['id'];
//        }
//    }
//
//    $cnt_id = 0;
//    $adID = '';
//    foreach ($functions->ArrayRandom($arrayKey) as $key => $val) {
//        if ($cnt_id < $number_of_ad) {
//            $adID .= ',' . $val;
//            $cnt_id++;
//        }
//    }
//
//    $arrForRandom = explode(',', substr($adID, 1));
//
//    $html = '';
//    foreach ($arrForRandom as $val_id) {
//        //
//        $sqlImg = "SELECT * FROM " . $user_banner->getTbl() . " WHERE id = " . $val_id . "  AND status = 'unclick'";
//        $queryImg = $db->Query($sqlImg);
//
//        if ($db->NumRows($queryImg) > 0) {
//            while ($row = $db->FetchArray($queryImg)) {
//
//                $html .= "<p> 
//                <img src=" . ADDRESS . 'img/' . $row['image'] . " class='img-responsive click-ad' onclick='click_ad(" . $functions->encode_login($row['id']) . ", this)' style='max-width: 100%;'>
//
//            </p>";
//            }
//        }
//    }
//


    $sqlImg = "SELECT * FROM " . $user_banner->getTbl() . " WHERE member_id = " . $_SESSION['admin_id'] . "  AND current_show = 1";
    $queryImg = $db->Query($sqlImg);

    if ($db->NumRows($queryImg) > 0) {
        while ($row = $db->FetchArray($queryImg)) {

            $html .= "<p> 
                <img src=" . ADDRESS . 'img/' . $row['image'] . " class='img-responsive click-ad' onclick='click_ad(" . $functions->encode_login($row['id']) . ", this)' style='max-width: 100%;'>

            </p>";
        }
    }


    if ($member->updateSQL($arrData, $arrConID)) {

        $date = $member->getDataDesc('end_date_at', 'id = ' . $_SESSION['admin_id']);
        $dt = new DateTime($date);

        $arr = array(
            'data' => date_format($dt, 'Y/m/d H:i:s'),
            'html' => $html
        );
    } else {
        $arr = array();
    }


    echo json_encode($arr);
} else {

    $date = $member->getDataDesc('end_date_at', 'id = ' . $_SESSION['admin_id']);
    $dt = new DateTime($date);

    $arr = array(
        'data' => date_format($dt, 'Y/m/d H:i:s'),
    );


    echo json_encode($arr);
}








//print_r(custom_shuffle($array));
?>