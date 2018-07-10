<?php echo head(array('bodyid'=>'home')); ?>

<?php echo get_theme_option('Homepage About'); ?>

<?php
$recentCollections = get_theme_option('Homepage Recent Collections');
if ($recentCollections === null || $recentCollections === ''):
  $recentCollections = 3;
else:
  $recentCollections = (int) $recentCollections;
endif;
if ($recentCollections):
?>

<h2><?php echo __('Recently Added Collections'); ?></h2>
    <?php foreach (get_recent_collections($recentCollections) as $collection): ?>
        <div class="row">
            <div class="col-sm-12">
        <h2><?php echo link_to_collection(array(), array(), 'show', $collection); ?></h2>
        <?php if ($collectionImage = record_image($collection)): ?>
          <?php echo link_to_collection($collectionImage, array('class' => 'image'), 'show', $collection); ?>
        <?php endif; ?>
    <?php if (metadata($collection, array('Dublin Core', 'Description'))): ?>
            <div class="collection-description">
              <?php echo text_to_paragraphs(metadata($collection, array('Dublin Core', 'Description'), array('snippet' => 250))); ?>
            </div>
            <div class="ui-button-text"><?php echo link_to_collection('View Collection', array(), 'show', $collection) ?></div>
    <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>



<div class="row">
    <div class="col-sm-4">
        <?php if (get_theme_option('Display Featured Item') !== '0'): ?>
            <h2><?php echo __('Featured Item'); ?></h2>
            <?php echo random_featured_items(1); ?>
        <?php endif; ?>
    </div>
    <div class="col-sm-4">
        <?php if (get_theme_option('Display Featured Collection') !== '0'): ?>
            <h2><?php echo __('Featured Collection'); ?></h2>
            <?php echo random_featured_collection(); ?>
        <?php endif; ?>
    </div>
    <div class="col-sm-4">
        <?php if ((get_theme_option('Display Featured Exhibit') !== '0') && plugin_is_active('ExhibitBuilder') && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
            <?php echo exhibit_builder_display_random_featured_exhibit(); ?>
        <?php endif; ?>
    </div>
</div>

<?php echo foot(); ?>
