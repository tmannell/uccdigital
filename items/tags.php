
    <?php
        $pageTitle = __('Browse Items');
        echo head(array('title'=>$pageTitle, 'bodyclass'=>'items tags'));
    ?>
    <div class="container">
    <h1><?php echo $pageTitle; ?></h1>
    <?php $subnav = ucc_digital_public_nav_items(); echo $subnav->setUlClass('nav nav-pills'); ?>
    <br />
    <hr>

    <?php echo tag_cloud($tags, 'items/browse'); ?>
    </div>
<?php echo foot(); ?>
