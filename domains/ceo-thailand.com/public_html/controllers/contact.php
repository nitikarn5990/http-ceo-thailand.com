
<?php
@session_start();
if ($_POST ["submit_bt"] == 'Send') {
    $chk = 0;
    $cpt = $_POST['capt'];
    if ($cpt != $_SESSION['CAPTCHA']) {
        ?>
        <script> alert('Error code');</script>
        <?php
    } else {

        $chk = 1;
        $arrData = array();

        $arrData = $functions->replaceQuote($_POST);

        $contact_message->SetValues($arrData);

        if ($contact_message->GetPrimary() == '') {

            $contact_message->SetValue('created_at', DATE_TIME);

            $contact_message->SetValue('updated_at', DATE_TIME);
        } else {

            $contact_message->SetValue('updated_at', DATE_TIME);
        }

        $contact_message->SetValue('status', 'no read');

        // $contact_message->Save();

        if ($contact_message->Save()) {



            // echo "<script>  alert('Send Success');</script>";
            require_once($_SERVER["DOCUMENT_ROOT"] . '/phpmailer/class.phpmailer.php');
            $logo = ADDRESS . 'images/logo.png';

            $name = $contact_message->GetValue("txt_name");
            $email = $contact_message->GetValue("txt_email");
            $tel = $contact_message->GetValue("txt_tel");
            $subject = $contact_message->GetValue("txt_subject");
            $message = $contact_message->GetValue("txt_message");


            $mail = new PHPMailer();
            $mail->IsHTML(true);
            $mail->IsSMTP();
            $mail->SMTPAuth = true; // enable SMTP authentication
            $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
            $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
            $mail->Port = 465; // set the SMTP port for the GMAIL server

            $mail->Username = "amazingtrekking.sendmail@gmail.com"; // บัญชีสำหรับส่งเมล์ Gmail
            $mail->Password = "Thailand2016"; //  รหัส GMAIL
            $mail->FromName = "amazing-trekking.com";  // ชื่อผู้ส่ง 
            $mail->Subject = "รายละเอียดการติดต่อ"; //ชื่อเรื่อง
            $mail->AddCC('kaluguide@yahoo.co.th', 'kaluguide@yahoo.co.th'); //สำเนาส่งถึง เมล์เจ้าของร้าน
            $mail->AddReplyTo($email, $email); //ตอบกลับถึง ลูกต้า

            $mail->CharSet = "utf-8";

            $body = "<table>
  <thead>
    <tr style='text-align:left;'>
      <th colspan='3'>ข้อมูลการติดต่อจากลูกค้า</th>
    </tr>
 
  </thead>
  <tbody>
    <tr>
      <td>Name :</td>
      <td>$name</td>
    </tr>
     <tr>
      <td>E-mail :</td>
      <td>$email</td>
    </tr>
       <tr>
      <td>Tel :</td>
      <td>$tel</td>
    </tr>
     <tr>
      <td>Subject :</td>
      <td>$subject</td>
    </tr>
  
     <tr>
      <td>message :</td>
      <td>$message</td>
    </tr>
 

  </tbody>
</table>";

            $mail->Body = $body;
            $mail->AddAddress($email); // to Address

            $mail->set('X-Priority', '1'); //Priority 1 = High, 3 = Normal, 5 = low

            if (!$mail->Send()) {
                echo "<script>alert('Error !!!')</script>";
            } else {
                echo "<script>alert('Success !!!')</script>";
            }
        } else {
            echo "<script>  alert('Error');</script>";
        }
    }
}
?>


<div id="content">
    <h1><?= $contact->getDataDesc('contact_title', 'id = 1') ?></h1>
    <p><?= $contact->getDataDesc('contact_detail', 'id = 1') ?></p>
    <div class="map">
        <?= $contact->getDataDesc('google_map', 'id = 1') ?>
    </div>
    <div class="formemail">
        <form action="<?php echo ADDRESS ?>contact" method="post" class="form-send-msg">

            <p> Name<br />
                <span>
                    <input type="text" name="txt_name" value="<?= $chk == 0 ? $_POST['txt_name'] : '' ?>"

                           class="contactin"  required="required" />
                </span> </p>
            <p> Email.<br />
                <span>
                    <input type="email" name="txt_email" class="contactin" value="<?= $chk == 0 ? $_POST['txt_email'] : '' ?>"

                           required="required" />
                </span> </p>
            <p> Tel<br />
                <span>
                    <input type="text" name="txt_tel" value="<?= $chk == 0 ? $_POST['txt_tel'] : '' ?>"

                           class="contactin" required="required" />
                </span> </p>
            <p> Subject<br />
                <span>
                    <input type="text" name="txt_subject" value="<?= $chk == 0 ? $_POST['txt_subject'] : '' ?>" 

                           class="contactin" required="required" />
                </span> </p>
            <p> Message<br />
                <span>
                    <textarea name="txt_message" class="area" 
                              required="required" rows="7" cols="50"><?= $chk == 0 ? $_POST['txt_message'] : '' ?></textarea>
                </span> </p>
            <p>
                Enter Code
                <input type="text" name="capt" class="contactin" id="capt" required=""/> <img src="image_capt.php" id="mycapt"  align="absmiddle" />

                <img id="changeCpt" src="https://www.e-cnhsp.sp.gov.br/GFR/imagens/refresh.png" style="vertical-align: middle;cursor: pointer;">
            </p>
            <p>
                <input id="submit_bt" name="submit_bt" type="submit" value="Send"

                       style="width: 80px; height: 30px;" />
                <input name="reset"

                       type="reset" value="Reset" style="width: 80px; height: 30px;" />
            </p>
        </form>
    </div>
    <?php include 'inc_footer.php'; ?>


    <style>
        .form-send-msg p{
            margin-bottom: 10px;
        }
        #contant input{
            //  height: 20px;
            // width: 300px;
        }
        #capt{
            width: 100px;
        }
        textarea{
            background-color: white;
        }

        table {
            color: #333;
            font-family: sans-serif;
            font-size: .9em;
            font-weight: 300;
            text-align: left;
            line-height: 40px;
            border-spacing: 0;
            border: 2px solid #54733c;
            width: 70%;
            margin: 10px auto;
        }

        thead tr:first-child {
            background: #54733c;
            color: #fff;
            border: none;
        }

        th {font-weight: bold;}
        th:first-child, td:first-child {padding: 0 15px 0 20px;}

        thead tr:last-child th {border-bottom: 0px solid #ddd;}
        thead tr {background-color: #FFF;}
        tbody tr {background-color: #FFF;}
        tbody tr:hover {background-color: rgba(84, 115, 60, 0.19);}
        tbody tr:last-child td {border: none;}
        tbody td {border-bottom: 1px solid #ddd;}

        td:last-child {
            text-align: right;
            padding-right: 10px;
        }

        .button {
            color: #696969;
            padding-right: 5px;
            cursor: pointer;
        }

        .alterar:hover {
            color: #0a79df;
        }

        .excluir:hover {
            color: #dc2a2a;
        }
    </style>


    <script type="text/javascript">



        $('#changeCpt').click(function (e) {
            var v = Math.random();
            $('#mycapt').attr('src', 'image_capt.php?v=' + v);
        });

    </script>
</div>



<script type="text/javascript">
    $(document).ready(function () {

        $("iframe").width("100%").height("450");
        if ($(window).width() < 992) {

        } else {
            $("#slide_top").width("100%").height("292");
        }

    });
</script> 

