<?php
$title = __('Browse Exhibits');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>

<div class="container">
    <h2><?php echo $title; ?></h2>
    <?php if (count($exhibits) > 0): ?>

    <?php $exhibitCount = 0; ?>
    <?php foreach (loop('exhibit') as $exhibit): ?>
        <?php $title = metadata($exhibit, 'Title'); ?>
        <?php $exhibitCount++; ?>
        <div class="row exhibit <?php if ($exhibitCount%2==1) echo ' even'; else echo ' odd'; ?>">
            <div class="row">
                <div class="col-sm-12">
                    <h2><?php echo link_to_exhibit($title, array('title' => 'View Exhibit')); ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <?php if ($exhibitImage = record_image($exhibit, null, array('class' => 'image', 'alt' => $title, 'title' => 'View Exhibit'))): ?>
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

    <?php else: ?>
    <p><?php echo __('There are no exhibits available yet.'); ?></p>
    <?php endif; ?>
</div>
<?php echo foot(); ?>
