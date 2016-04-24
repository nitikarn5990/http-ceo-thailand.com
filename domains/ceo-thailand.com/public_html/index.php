<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>CEO Thailand</title>
        <meta name="keywords" content="CEO Thailand">
            <meta name="description" content="CEO Thailand">
                <link href="style.css" rel="stylesheet" type="text/css" />
                <link rel="shortcut icon" href="images/icon.png">
                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
                    <script src="dist/slippry.min.js"></script>
                    <script src="//use.edgefonts.net/cabin;source-sans-pro:n2,i2,n3,n4,n6,n7,n9.js"></script>
                    <meta name="viewport" content="width=device-width">
                        <link rel="stylesheet" href="slide.css">
                            <link rel="stylesheet" href="dist/slippry.css">
                                </head>
                                <body>
                                    <div id="topmenu">
                                        <div id="menu">
                                            <ul>
                                                <li><a href="">หน้าหลัก</a></li>
                                                <li>/</li>
                                                <li><a href="">แผนการสร้างรายได้</a></li>
                                                <li>/</li>
                                                <li><a href="">ระบบงาน</a></li>
                                                <li>/</li>
                                                <li><a href="">สมัครสมาชิก</a></li>
                                                <li>/</li>
                                                <li><a href="">ติดต่อเรา</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="slide">
                                        <div id="centerslide">
                                            <article class="demo_block">
                                                <ul id="demo1" style="list-style:none; position:0; margin:0;">
                                                    <li><a href="#slide1"><img src="img/slide.jpg" width="960" height="492" /></a></li>
                                                    <li><a href="#slide1"><img src="img/slide.jpg" width="960" height="492" /></a></li>
                                                </ul>
                                            </article>

                                        </div>
                                    </div>
                                    <p class="clear"></p>
                                    <div id="tab"><marquee>เริ่มต้นเพียงแค่ 200 บาทเท่านั้น</marquee></div>
                                    <div id="container">
                                        <div class="sidebarleft"><img src="images/login.jpg" /></div>
                                        <div class="content">
                                            <h1>CEO Thailand</h1>
                                            <p>เราเสนอโอกาสให้คุณตอบแบบสำรวจได้โดยสะดวกจากคอมพิวเตอร์ของคุณเองผ่านระบบออนไลน์ของเรา โดยเราจะจัด<br />
                                                ส่งคำเชิญเข้าร่วมทำแบบสำรวจทางอีเมลให้กับคุณอย่างสม่ำเสมอ ซึ่งคุณสามารถร่วมตอบได้ง่ายๆ ทางอินเตอร์เน็ต</p>
                                            <p>เราจะแจ้งให้คุณทราบล่วงหน้าว่าการทำแบบสำรวจจะใช้เวลาเท่าใดและคุณจะได้รับค่าตอบแทนเป็นจำนวนเท่าใด และ<br />
                                                แน่นอนว่าจะไม่มีข้อผูกมัดที่จะต้องเข้าร่วมทำแบบสำรวจ คุณสามารถตัดสินใจเองว่าจะร่วมทำแบบสำรวจใด และ<br />
                                                กรอกแบบสำรวจที่คุณสนใจผ่านทางอินเตอร์เน็ตได้ในเวลาที่เหมาะกับคุณ </p>
                                            <p><a href=""><img src="images/img1.jpg" /></a></p>
                                            <p><a href=""><img src="images/img2.jpg" /></a></p>
                                            <p><a href=""><img src="images/img3.jpg" /></a></p>
                                            <p><a href=""><img src="images/img4.jpg" /></a></p>
                                        </div>
                                    </div>
                                    <div id="footer">
                                        <p>www.ceo-thailand.com</p>
                                        <p>โทร. 091-0613072, 097-9571507, 082-3984091<br />
                                            บริหารงานโดย บริษัท ceo-thailand จำกัด</p>
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
                                </body>
                                </html>
