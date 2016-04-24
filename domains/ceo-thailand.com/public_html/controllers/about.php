<div id="content">
  <h1><?= $location->getDataDescLastID('location_title', 'id = 1') ?></h1>
    <div class="model_detail2">
        <p>
            <?php
       
            echo $location->getDataDescLastID('location_detail', 'id = 1');
            ?>
        </p>
    </div>
   
    <?php include_once  'inc_footer.php';?>
</div> 