<?php echo head(array(
    'title' => metadata('simple_pages_page', 'title'),
    'bodyclass' => 'page simple-page',
    'bodyid' => metadata('simple_pages_page', 'slug')
)); ?>

<div class="container">
    <h2 class="simple-page-title"><?php echo metadata('simple_pages_page', 'title'); ?></h2>
    <div class="row">
        <div class="col-sm-12 simple-page-content">
            <?php
            $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
            echo $this->shortcodes($text);
            ?>
        </div>
    </div>
</div>

<?php echo foot(); ?>
