<?php echo head(array('title' => metadata('exhibit', 'title'), 'bodyclass'=>'exhibits summary')); ?>

<div class="exhibit-container exhibit-container-correction">

    <div class="row">
        <div class="col-sm-8 exhibit-info-col">
            <h2 class="exhibition-title"><?php echo metadata('exhibit', 'title'); ?></h2>
            <?php echo exhibit_builder_page_nav(); ?>
            <div class="row">
                <div class="col-sm-12" id="primary">
                    <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
                    <div class="exhibit-description">
                        <?php echo $exhibitDescription; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-sm-4 exhibit-side">
            <nav class="nav-sidebar" id="exhibit-pages">
              <?php
              $pageTree = exhibit_builder_page_tree();
              if ($pageTree):
                ?>
                <?php echo $pageTree; ?>
              <?php endif; ?>
            </nav>
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

<?php echo foot(); ?>
