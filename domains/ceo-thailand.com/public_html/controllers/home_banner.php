<?php
$sql = "SELECT * FROM " . $home_banner->getTbl() . " WHERE status = 'ใช้งาน' ORDER BY sort ASC";


$query = $db->Query($sql);

if ($db->NumRows($query) > 0) {
    while ($row = $db->FetchArray($query)) {
        ?>
        <p><a href="<?= ADDRESS ?>home/<?= $row['id'] ?>/<?= $row['name_ref'] ?>"><img src="<?= ADDRESS ?>img/<?= $row['image'] ?>" /></a></p>


    <?php } ?>

<?php } ?>
