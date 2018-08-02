<?php
$title = __('Browse Exhibits');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>

<div class="container">
    <h2><?php echo $title; ?></h2>

    <div class="browse-exhibitions">
        <?php if (count($exhibits) > 0): ?>
        <?php $exhibitCount = 0; ?>
        <?php foreach (loop('exhibit') as $exhibit): ?>
          <div class="row exhibition-row">
            <?php $title = metadata($exhibit, 'Title'); ?>
            <?php $exhibitCount++; ?>
            <div class="row exhibition-title">
                <div class="col-sm-12">
                    <h3><?php echo link_to_exhibit($title, array('title' => 'View Exhibit')); ?></h3>
                </div>
            </div>
            <div class="row exhibition-info">
                <div class="col-sm-3">
                    <?php if ($exhibitImage = record_image($exhibit, null, array('class' => 'image', 'alt' => $title, 'title' => 'View Exhibit'))): ?>
                        <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); ?>
                    <?php endif; ?>
                </div>
                <div class="col-sm-9">
                    <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
                        <div class="exhibition-description"><?php echo $exhibitDescription; ?></div>
                        <div class="ui-button-text"><?php echo link_to_exhibit('View Exhibit', array('alt' => 'View Exhibit', 'title' => 'View Exhibit')) ?></div>
                    <?php endif; ?>
                </div>
            </div>
          </div>
        <?php endforeach; ?>
        <?php else: ?>
        <p><?php echo __('There are no exhibits available yet.'); ?></p>
        <?php endif; ?>
    </div>
  <?php echo pagination_links(); ?>

</div>
<?php echo foot(); ?>
