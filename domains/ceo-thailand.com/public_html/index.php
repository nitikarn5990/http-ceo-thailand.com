<?php
session_start();

include_once($_SERVER["DOCUMENT_ROOT"] . '/lib/application.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>CEO Thailand</title>
        <meta name="keywords" content="CEO Thailand">
            <meta name="description" content="CEO Thailand">
                <link href="<?= ADDRESS ?>style.css" rel="stylesheet" type="text/css" />

                <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
                <script src="<?= ADDRESS ?>dist/slippry.min.js"></script>
                <script src="//use.edgefonts.net/cabin;source-sans-pro:n2,i2,n3,n4,n6,n7,n9.js"></script>
                <meta name="viewport" content="width=device-width">
                    <link rel="stylesheet" href="<?= ADDRESS ?>slide.css">
                        <link rel="stylesheet" href="<?= ADDRESS ?>dist/slippry.css">
                            <link rel="stylesheet" href="<?= ADDRESS ?>grid24.css">
                                </head>
                                <body>
                                    <div id="topmenu">
                                        <div id="menu">
                                            <ul>
                                                <li><a href="<?= ADDRESS ?>home">หน้าหลัก</a></li>
                                                <li>/</li>
                                                <li><a href="<?= ADDRESS ?>plan_make_money/แผนการสร้างรายได้">แผนการสร้างรายได้</a></li>
                                                <li>/</li>
                                                <li><a href="<?= ADDRESS ?>work_system/ระบบงาน">ระบบงาน</a></li>
                                                <li>/</li>
                                                <li><a href="<?= ADDRESS ?>registration/สมัครสมาชิก">สมัครสมาชิก</a></li>
                                                <li>/</li>
                                                <li><a href="<?= ADDRESS ?>contact/ติดต่อเรา">ติดต่อเรา</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="slide">
                                        <div id="centerslide">
                                            <article class="demo_block">
                                                <ul id="demo1" style="list-style:none; position:0; margin:0;">
                                                    <?php
                                                    $sql = "SELECT * FROM " . $slides->getTbl() . " WHERE status = 'ใช้งาน' ORDER BY sort ASC";
                                                    $query = $db->Query($sql);

                                                    if ($db->NumRows($query) > 0) {
                                                        while ($row = $db->FetchArray($query)) {
                                                            ?>
                                                            <li><a href="#slide1"><img src="<?= ADDRESS ?>img/<?= $row['image'] ?>" width ="960" height="492" /></a></li>
                                                        <?php } ?>
                                                    <?php } ?>

                                                </ul>
                                            </article>

                                        </div>
                                    </div>
                                    <p class="clear"></p>
                                    <div id="tab"><marquee><?= $text_slide->getDataDesc('title', 'id = 1'); ?></marquee></div>
                                    <div id="container">
                                        <form action="/admin/login.php" method="POST">  
                                            <div class="sidebarleft">

                                                <div class="login row">
                                                    <?php
                                                    // Report errors to the user
                                                    Alert(GetAlert('error'));
                                                    Alert(GetAlert('success'), 'success');
                                                    ?>
                                                    <div style="margin: 17px 0 10px 0; text-align: center;">
                                                        <span style="color: #FFF;font-size: 22px;">เข้าสู่ระบบ</span>
                                                    </div>
                                                    <div style="text-align: right;margin: 0 0 10px 0;" class="row">
                                                        <div style="color: #FFF;" class="col-md-8">ผู้ใช้ : &nbsp;</div>
                                                        <div class="col-md-16 text-right">   <input type="text" class="user-username" name="username" required/></div>
                                                        <input type="hidden" value="<?= $functions->encode_login('member') ?>" name="group">
                                                    </div>
                                                    <div style="text-align: right;margin: 0 0 10px 0;" class="row">
                                                        <div style="color: #FFF;" class="col-md-8">รหัสผ่าน : &nbsp;</div>
                                                        <div class="col-md-16">   <input type="password" class="user-username" name="password" required/></div>

                                                    </div>
                                                    <div style="padding: 10px 0 0 0;" class="">
                                                        <div class="col-md-24" style="margin: 0 0 10px 0;">
                                                            <input type="submit" value="เข้าสู่ระบบ" name="submit_bt" class="btn-login submit_bt"/>
                                                        </div>
                                                        <div class="col-md-24">
                                                            <a href="<?= ADDRESS ?>registration/สมัครสมาชิก" class="btn-login col-md-24" style="text-align: center;text-decoration: none;">สมัครสมาชิก</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="content">
                                            <?php
                                            if (PAGE_CONTROLLERS == 'home') {

                                                if ($_GET['param2'] != '') {
                                                    if ($_GET['param2'] == "6") {

                                                        include 'controllers/iphone.php';
                                                    } else {
                                                        include 'controllers/home_banner_detail.php';
                                                    }
                                                } else {
                                                    include 'controllers/home.php';
                                                    include 'controllers/home_banner.php';
                                                }
                                            } else {
                                                include './controllers/' . PAGE_CONTROLLERS . '.php';
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <div id="footer">
                                        <?= $footer->getDataDesc("detail", "id = 1"); ?>
                                    </div>
                                    <script>
                                        $(function () {
                                            var demo1 = $("#demo1").slippry({
                                                transition: 'fade',
                                                useCSS: true,
                                                speed: 1000,
                                                pause: 3000,
                                                auto: true,
                                                preload: 'visible'
                                            });

                                            $('.stop').click(function () {
                                                demo1.stopAuto();
                                            });

                                            $('.start').click(function () {
                                                demo1.startAuto();
                                            });

                                            $('.prev').click(function () {
                                                demo1.goToPrevSlide();
                                                return false;
                                            });
                                            $('.next').click(function () {
                                                demo1.goToNextSlide();
                                                return false;
                                            });
                                            $('.reset').click(function () {
                                                demo1.destroySlider();
                                                return false;
                                            });
                                            $('.reload').click(function () {
                                                demo1.reloadSlider();
                                                return false;
                                            });
                                            $('.init').click(function () {
                                                demo1 = $("#demo1").slippry();
                                                return false;
                                            });
                                        });
                                    </script>

                                    <style>

                                        .login{
                                            padding: 5px 5px 20px 5px;
                                            width: 241px;
                                            border-radius: 10px;
                                            background-color: #571A9B;
                                            border: 2px solid #FFF;

                                        }
                                        .login .user-lable{
                                            width: 100%;

                                        }
                                        .login .user-username, .login .user-password{
                                            width: 100%;
                                        }
                                        .btn-login{

                                            border-radius: 10px;
                                            background-color: #F3840E;
                                            border: 2px solid #FFF;
                                            padding: 5px;
                                            color: #FFF;
                                            font-size: 16px;
                                            width: 100%;
                                        }

                                        .alert,.da-message {
                                            font-size: 12px;
                                            border: 1px solid #d2d2d2;
                                            padding: 15px 8px 15px 45px;
                                            position: relative;
                                            cursor: pointer;
                                            background-color: #f8f8f8;
                                            background-position: 12px 12px;
                                            background-repeat: no-repeat;

                                        }
                                        .alert-heading {
                                            color: inherit;
                                        }
                                        .alert .close {
                                            position: relative;
                                            top: -2px;
                                            right: -21px;
                                            line-height: 18px;
                                        }

                                        .alert-danger,
                                        .alert-error,.error {
                                            color: #b94a48;
                                            background-color: #f2dede;
                                            border-color: #eed3d7;
                                             background-image: url(<?= ADDRESS ?>admin/assets/images/message-error.png);
                                        }
                                        .alert-success,.success {
                                            color: #62a426;
                                            background-color: #e1f1c0;
                                            border-color: #b5d56d;
                                            background-image: url(<?= ADDRESS ?>admin/assets/images/message-success.png);
                                        }

                                        .submit_bt{
                                            cursor: pointer;
                                        }


                                    </style>
                                </body>
                                </html>
