
<div id="content" class="col-xs-12">
    <h1><?= $home->getDataDesc('home_title', 'id = 1'); ?></h1>
    <div class="home_shortdetail">
        <?php
        if ($_GET['home'] == "detail") {
            echo $home->getDataDesc('home_detail', 'id = 1');
        } else {
            echo $home->getDataDesc('home_shortdetail', 'id = 1');
        }
        ?> 
    </div>
    <?php if ($_GET['home'] == "") { ?>
        <div>
            <?php
            $sql1 = "SELECT * FROM " . $guestbook->getTbl() . "  ORDER BY id DESC LIMIT 0,3";
          
            $query1 = $db->Query($sql1);
            $numRow1 = $db->NumRows($query1);
            if ($numRow1 > 0) {

                while ($row1 = $db->FetchArray($query1)) {
                    ?>
                    <div class="review">
                        <div class="imgreview"><img src="<?= ADDRESS ?>img/<?= $row1['image'] != '' ? $row1['image'] : 'no-image.jpg' ?>" style="width: 140px;height: 113px;" /></div>
                        <div class="txtreview">
                            <p class="colorreview"><?= $row1['title'] ?> /  <a href="<?= ADDRESS ?>guestbook" style="vertical-align:top; margin:0 0 0 10px;">Guestbook</a></p>
                            <p class="txtnamereview"><?= $row1['name'] ?></p>
                            <p>
                                <?= $row1['comment'] ?>
                            </p>
                        </div> 
                        <div class="clear"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    <?php } ?>
    
</div>
<?php if ($_GET['home'] == "") { ?>
    <script>
        // $( ".home_shortdetail" ).append( );
        $(document).ready(function () {
            $(".home_shortdetail>p:last").append('<a href="<?= ADDRESS ?>?home=detail">...Read more</a>');
        });

        // $('<div class="item">Item 3</div>').insertAfter('.home_shortdetail P:last');
    </script>
<?php
}?>