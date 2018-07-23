<?php
    $title = __('Browse Exhibits');
    echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>

    <h1><?php echo $title; ?></h1>

    <div class="browse-exhibitions">
      <?php if (count($exhibits) > 0): ?>
        <?php foreach (loop('exhibit') as $exhibit): ?>
            <div class="row">
                <div class="col-sm-12">
                    <h2><?php echo link_to_exhibit(); ?></h2>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                      <?php if ($exhibitImage = record_image($exhibit)): ?>
                        <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); ?>
                      <?php endif; ?>
                    </div>

                    <div class="col-sm-9">
                      <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
                          <div class="description"><?php echo $exhibitDescription; ?></div>
                      <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <?php echo pagination_links(); ?>
    </div>

  <?php else: ?>
      <p><?php echo __('There are no exhibits available yet.'); ?></p>
  <?php endif; ?>

  <?php echo foot(); ?>





