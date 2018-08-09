<?php echo head(array('bodyid'=>'home')); ?>

<div class="container container-correction">
    <?php echo get_theme_option('Homepage About'); ?>
</div>

<?php
$recentCollections = get_theme_option('Homepage Recent Collections');
if ($recentCollections === null || $recentCollections === ''):
  $recentCollections = 3;
else:
  $recentCollections = (int) $recentCollections;
endif;
if ($recentCollections):?>
<div class="container container-correction">
    <h2><?php echo __('Recently Added Collections'); ?></h2>
    <hr/>
    <?php foreach (get_recent_collections($recentCollections) as $collection): ?>
    <div class="row collection-row">
        <div class="row collection-title">
            <div class="col-sm-12">
                <h3><?php echo link_to_collection(array(), array(), 'show', $collection); ?></h3>
            </div>
        </div>
        <div class="row collection-info">
            <div class="col-sm-3">
                <?php if ($collectionImage = record_image($collection)): ?>
                    <?php echo link_to_collection($collectionImage, array('class' => 'image'), 'show', $collection); ?>
                 <?php endif; ?>
            </div>
            <div class="col-sm-9">
                <?php if (metadata($collection, array('Dublin Core', 'Description'))): ?>
                <div class="collection-description">
                    <?php echo text_to_paragraphs(metadata($collection, array('Dublin Core', 'Description'), array('snippet' => 250))); ?>
                </div>
                <div class="ui-button-text"><?php echo link_to_collection('View Collection', array(), 'show', $collection) ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
<?php endif; ?>
</div>

<?php if (get_theme_option('Display Featured Item') !== '0'
          || get_theme_option('Display Featured Collection') !== '0'
          || ((get_theme_option('Display Featured Exhibit') !== '0' && plugin_is_active('ExhibitBuilder') && function_exists('exhibit_builder_display_random_featured_exhibit')))): ?>

<div class="container">
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
</div>

<?php endif; ?>

<?php echo foot(); ?>
