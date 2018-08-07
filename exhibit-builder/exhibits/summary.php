<?php echo head(array('title' => metadata('exhibit', 'title'), 'bodyclass'=>'exhibits summary')); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1><?php echo metadata('exhibit', 'title'); ?></h1>
            <?php echo exhibit_builder_page_nav(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12" id="primary">
            <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
            <div class="exhibit-description">
                <?php echo $exhibitDescription; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
            <div class="col-sm-12 exhibit-credits">
                <h3><?php echo __('Credits'); ?></h3>
                <p><?php echo $exhibitCredits; ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="container">
        <?php
        $pageTree = exhibit_builder_page_tree();
        if ($pageTree):
        ?>
        <nav class="row" id="exhibit-pages">
            <div class="col-sm-12">
                <?php echo $pageTree; ?>
            </div>
        </nav>
        <?php endif; ?>
    </div>
</div>

<?php echo foot(); ?>
