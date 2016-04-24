<?php
session_start();

include_once($_SERVER["DOCUMENT_ROOT"] . '/lib/application.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Amazing  private  tour</title>
        <meta name="description" content="Amazing  private  tour" />
        <meta name="keywords" content="Amazing  private  tour" />
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" href="<?= ADDRESS ?>bootstrap.min.css" />
        <link rel="shortcut icon" href="<?= ADDRESS ?>images/icon.png" />
       
        <link rel="stylesheet" href="<?= ADDRESS ?>dist/slippry.css" />

        <script src="<?= ADDRESS ?>js/jquery.min.js"></script>
        <script src="<?= ADDRESS ?>dist/slippry.min.js"></script>
        <script src="<?= ADDRESS ?>plugins/verify.notify.min.js"></script>
        <script src="<?= ADDRESS ?>js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="<?= ADDRESS ?>src/css/lightbox.css" />

         <link href="<?= ADDRESS ?>res.css" rel="stylesheet" type="text/css" />
        <script src='https://www.google.com/recaptcha/api.js?hl=en'></script>
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
            .da-message {
                font-size: 12px;
                border: 1px solid #d2d2d2;
                padding: 15px 8px 15px 45px;
                position: relative;
                cursor: pointer;
                background-color: #f8f8f8;
                background-position: 12px 12px;
                background-repeat: no-repeat;
                margin: 10px 0 10px 0;
            }
            .da-message.success {
                background-color: #e1f1c0;
                background-image: url(admin/assets/images/message-success.png);
                border-color: #b5d56d;
                color: #62a426;
            }
            .da-message.error {
                background-color: #F2DEDE;
                background-image: url(admin/assets/images/message-error.png);
                border-color: rgba(235, 151, 155, 0.48);
                color: #9b4449;
            }

        </style>

    </head>
    <body>
        <nav class="navbar navbar-default hidden-lg hidden-md">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img src="<?= ADDRESS ?>/images/logo.png" class="img-responsive" style="max-height: 50px;"/>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">

                        <li class="<?= PAGE_CONTROLLERS == '' ? 'active' : '' ?>"><a href="<?= ADDRESS ?>" class="<?= PAGE_CONTROLLERS == '' ? 'active' : '' ?>" title="Home">Home</a></li>
                        <li class="<?= PAGE_CONTROLLERS == 'about' ? 'active' : '' ?>"><a href="<?= ADDRESS ?>about" class="<?= PAGE_CONTROLLERS == 'about' ? 'active' : '' ?>" title="About Us">About Us</a></li>
                        <li class="<?= PAGE_CONTROLLERS == 'programs' ? 'active' : '' ?>"><a href="<?= ADDRESS ?>programs" class="<?= PAGE_CONTROLLERS == 'programs' ? 'active' : '' ?>" title="Programs">Programs</a></li>
                        <li class="<?= PAGE_CONTROLLERS == 'guestbook' ? 'active' : '' ?>"><a href="<?= ADDRESS ?>guestbook" class="<?= PAGE_CONTROLLERS == 'guestbook' ? 'active' : '' ?>" title="Guestbook">Guestbook</a></li>
                        <li class="<?= PAGE_CONTROLLERS == 'gallery' ? 'active' : '' ?>"><a href="<?= ADDRESS ?>gallery" class="<?= PAGE_CONTROLLERS == 'gallery' ? 'active' : '' ?>" title="Gallery">Gallery</a></li>
                        <li class="<?= PAGE_CONTROLLERS == 'contact' ? 'active' : '' ?>"><a href="<?= ADDRESS ?>contact" class="<?= PAGE_CONTROLLERS == 'contact' ? 'active' : '' ?>" title="Contact Us">Contact Us</a></li>
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div id="header">
            <div id="menu-logo" class="hidden-xs hidden-sm">
                <div id="logo"><a href=""><img src="<?= ADDRESS ?>images/logo.png" width="86" height="96" /></a></div>
                <div id="menu">
                    <ul>
                        <li><a href="<?= ADDRESS ?>" class="<?= PAGE_CONTROLLERS == '' ? 'active' : '' ?>" title="Home">Home</a></li>
                        <li><a href="<?= ADDRESS ?>about" class="<?= PAGE_CONTROLLERS == 'about' ? 'active' : '' ?>" title="About Us">About Us</a></li>
                        <li><a href="<?= ADDRESS ?>programs" class="<?= PAGE_CONTROLLERS == 'programs' ? 'active' : '' ?>" title="Programs">Programs</a></li>
                        <li><a href="<?= ADDRESS ?>guestbook" class="<?= PAGE_CONTROLLERS == 'guestbook' ? 'active' : '' ?>" title="Guestbook">Guestbook</a></li>
                        <li><a href="<?= ADDRESS ?>gallery" class="<?= PAGE_CONTROLLERS == 'gallery' ? 'active' : '' ?>" title="Gallery">Gallery</a></li>
                        <li><a href="<?= ADDRESS ?>contact" class="<?= PAGE_CONTROLLERS == 'contact' ? 'active' : '' ?>" title="Contact Us">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="" id="slide">
                <article class="demo_block">
                    <ul id="demo1" style="list-style:none; position:0; margin:0; width:100%;">
                        <?php
                        $sql1 = "SELECT * FROM " . $slides->getTbl() . " WHERE status = 'ใช้งาน' ORDER BY sort ASC";
                        $query1 = $db->Query($sql1);
                        $numRow1 = $db->NumRows($query1);
                        if ($numRow1 > 0) {
                            while ($row1 = $db->FetchArray($query1)) {
                                ?>
                                <li><a href="#slide1"><img class="img-slides" src="<?php echo ADDRESS_SLIDES . $slides_file->getDataDescLastID("file_name", "slides_id = " . $row1['id']) ?>" /></a></li>

                            <?php } ?>
                        <?php } ?>

                    </ul>
                </article>

            </div>
            <div id="slidebar-left">
                <div>
                    <?= $social_script->getDataDescLastID("sc_youtube", "id = 1") ?>

                </div>
                <div class="sc_tripadvisor">
                    <?= $social_script->getDataDescLastID("sc_tripadvisor", "id = 1") ?>
                </div>


            </div>
            <!-- Content -->
            <?php
            if (PAGE_CONTROLLERS == '' || PAGE_CONTROLLERS == 'index') {

                include 'controllers/home.php';
            } else {
                include 'controllers/' . PAGE_CONTROLLERS . '.php';
            }
            ?>
            <div class="clear"></div>
            <?php if (PAGE_CONTROLLERS == '' || PAGE_CONTROLLERS == 'index') { ?>

                <?php include_once 'controllers/inc_footer.php'; ?>
            <?php } ?>
        </div>

    </body>
</html>
