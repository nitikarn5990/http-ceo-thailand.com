
<?php
/* curl function to get response object */

function curl_url($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

if ($_POST['submit_bt'] == 'Post Comment') {
    // set recaptchar paremeter 
    $params = array();
    $params['secret'] = '6Lev8RoTAAAAAPMGZxMM0W_et9GRtd4qxX4GZROB';
    $params['response'] = $_POST['g-recaptcha-response'];
    $params['remoteip'] = $_SERVER['REMOTE_ADDR'];

    $url = 'https://www.google.com/recaptcha/api/siteverify?';
    $url .= http_build_query($params);
    $response = curl_url($url); // use file_get_content if openssl
    $response = json_decode($response, true);

    if ($response['success']) {

        $arrData = array(
            'name' => $_POST['name'],
            'title' => $_POST['title'],
            'comment' => $_POST['comment'],
            'email' => $_POST['email'],
            'comment_show_home' => 'off',
            'created_at' => DATE_TIME,
            'updated_at' => DATE_TIME
        );

        $guestbook->SetValues($arrData);


        if ($_FILES["file_array"]["name"] != '') {

            $targetPath = DIR_ROOT_IMG;
            $newImage = DATE_TIME_FILE . "_" . $_FILES['file_array']['name'];
            $cdir = getcwd(); // Save the current directory
            chdir($targetPath);
            copy($_FILES['file_array']['tmp_name'], $targetPath . $newImage);
            chdir($cdir); // Restore the old working directory   
            $guestbook->SetValue('image', $newImage);
        }

        if ($guestbook->Save()) {

            SetAlert('Add Comment Success', 'success');

            header('location:' . ADDRESS . 'guestbook');

            die();
        } else {

            SetAlert('ไม่สามารถเพิ่ม แก้ไข ข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
        }
    } else {

        SetAlert('Error');

        header('location:' . ADDRESS . 'guestbook');

        die();
    }
}
?>

<div id="content">

    <?php
    // Report errors to the user
    Alert(GetAlert('error'));


    Alert(GetAlert('success'), 'success');
    ?>


    <!-- pagination -->

    <?php
    $strSQL = "SELECT * FROM " . $guestbook->getTbl();

    $objQuery = $db->Query($strSQL);
    $Num_Rows = $db->NumRows($objQuery);
    $numRow = $Num_Rows;

    $Per_Page = 5;   // Per Page

    $Page = $_GET["Page"];
    if (!$_GET["Page"]) {
        $Page = 1;
    }

    $Prev_Page = $Page - 1;
    $Next_Page = $Page + 1;

    $Page_Start = (($Per_Page * $Page) - $Per_Page);
    if ($Num_Rows <= $Per_Page) {
        $Num_Pages = 1;
    } else if (($Num_Rows % $Per_Page) == 0) {
        $Num_Pages = ($Num_Rows / $Per_Page);
    } else {
        $Num_Pages = ($Num_Rows / $Per_Page) + 1;
        $Num_Pages = (int) $Num_Pages;
    }

    $strSQL .=" order by id DESC LIMIT $Page_Start , $Per_Page";
    $objQuery = mysql_query($strSQL);
    ?>
    <h1>Guestbook Amazing  private  tour</h1>
    <?php
    while ($objResult = $db->FetchArray($objQuery)) {
        ?>
        <div class="comment-box hidden-xs hidden-sm">

            <p class="comment-number"><b>Comment #<?= $objResult['id']; ?></b></p>
            <div class="clear"></div>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="">
                <tr>
                    <td style="width:310px; margin:0; padding:0; text-align:left;">
                        <img src="<?= ADDRESS ?>img/<?= $objResult['image'] ?>" style="max-width:300px;">
                    </td>
                    <td valign="top">
                        <div class="comment-name"> <?= $objResult['name'] ?> </div>
                        <p class="comment-date">  <?= $functions->ShowDay($objResult['created_at']) . ',' . $functions->ShowDateEngTime($objResult['created_at']) ?></p>
                        <p class="comment-title"> <?= $objResult['title'] ?></p>
                        <div>
                            <p class="comment-detail">
                                <?= $objResult['comment'] ?>
                                <?php if ($objResult['image'] != '') { ?>  
                                <?php } ?>
                            <p>
                        </div>
                    </td>
                </tr>
            </table>



            <div class="clear"></div>
        </div>
        <div class="comment-box hidden-md hidden-lg">

            <p class="comment-number"><b>Comment #<?= $objResult['id']; ?></b></p>
            <div class="clear"></div>
            <div class="comment-name"> <?= $objResult['name'] ?> </div>
            <p class="comment-date">  <?= $functions->ShowDay($objResult['created_at']) . ',' . $functions->ShowDateEngTime($objResult['created_at']) ?></p>
            <p class="comment-title"> <?= $objResult['title'] ?></p>
            <div>
                <p class="comment-detail">
                <ul>
                    <li>
                        <?= $objResult['comment'] ?>
                    </li>
                    <?php if ($objResult['image'] != '') { ?>
                        <li>
                            <img src="<?= ADDRESS ?>img/<?= $objResult['image'] ?>" style="max-width: 100%;">
                        </li>       
                    <?php } ?>
                </ul>
                <p>
            </div>
            <div class="clear"></div>
        </div>
        <?php
    }
    ?>
    <div style="font-weight:bold;">
        <br>
        Total <?php echo $Num_Rows; ?> Record 

        <?php
        $pages = new Paginator;
        $pages->items_total = $Num_Rows;
        $pages->mid_range = 10;
        $pages->current_page = $Page;
        $pages->default_ipp = $Per_Page;
        $pages->url_next = ADDRESS_CONTROL . "guestbook&Page=";

        $pages->paginate();

        echo $pages->display_pages()
        ?>	
    </div>	
    <!-- End pagination -->
    <form method="POST" action="<?= ADDRESS ?>guestbook" enctype="multipart/form-data" id="frm-comment">
        <p><b>LEAVE YOUR COMMENT</b></p>
        <div id="comment_form">
            <div>
                <input type="text" name="name" id="name" value="" placeholder="Name" data-validate="required">
            </div>
            <div>
                <input type="email" name="email" id="email" value="" placeholder="Email" data-validate="required,email">
            </div>
            <div>
                <input type="text" name="title" id="title" value="" placeholder="Subject" data-validate="required">
            </div>
            <div>
                <textarea rows="10" name="comment" id="comment" placeholder="Comment" data-validate="required"></textarea>
            </div>
            <div>
                <p><input type="file" name="file_array" value="Attract File"></p>
                <div class="g-recaptcha" data-sitekey="6Lev8RoTAAAAAPdxUpFiEhs8n8cLijX9ZL-kDVVX"></div>
            </div>
            <div>

                <input type="submit" name="submit_bt2" value="Post Comment">
                <input type="hidden" name="submit_bt" value="Post Comment">
            </div>


        </div>
    </form>
    <?php include_once 'inc_footer.php'; ?>
</div>
<style>


   
</style>