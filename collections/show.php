<?php
    $collectionId = metadata('collection', 'id');
    $collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
    echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show'));
?>
<div class="container">
<h2 class="text-center"><a title="View Fonds Description at archeion.ca" href="<?php echo metadata('collection', array('Dublin Core', 'Relation')); ?>" target="_blank"><?php echo $collectionTitle; ?></a></h2>

        <div class="row">
            <div id="dublin-core-description" class="col-sm-12 collection-element-text">
                <h3><?php echo __('Description'); ?></h3>
                <?php echo metadata('collection', array('Dublin Core', 'Description')); ?>
            </div>
        </div>
        <?php if (metadata('collection', array('Dublin Core', 'Relation')) != '' || !is_null(metadata('collection', array('Dublin Core', 'Relation')))): ?>
        <div class="row">
            <div id="dublin-core-relation" class="col-sm-12 collection-element-text">
                <h3><?php echo __('Link to fonds level description'); ?></h3>
                <a href="<?php echo metadata('collection', array('Dublin Core', 'Relation')); ?>" target="_blank"><?php echo metadata('collection', array('Dublin Core', 'Relation')); ?></a>
            </div>
        </div>
        <?php endif; ?>

    </div>
    <div class="container container-correction" id="collection-items">
        <h3><?php echo __('Recent Items') ?></h3>
        <span><?php echo link_to_items_browse(__('View all items in collection'), array('collection' => metadata('collection', 'id'))); ?></span>

        <?php if (metadata('collection', 'total_items') > 0): ?>
            <?php
                $items = get_db()->getTable('Item')->findBy(array('collection_id' => $collectionId, 'sort_field' => 'added', 'sort_dir' => 'd'), 10);
            ?>
            <?php foreach (loop('items', $items) as $item):?>
                <div class="item">
                    <div class="row item-row">
                        <div class="col-sm-3">
                          <?php $image = $item->Files; ?>
                          <?php if ($image) {
                            echo link_to_item('<img class="image" src="' . file_display_url($image[0], 'thumbnail') . '" alt="' . metadata('item', array('Dublin Core', 'Title')) . '" />', array('title' => 'View Item'));
                          }
                          else {
                            echo link_to_item('<div style="background-image: url(' . img('defaultImage@2x.jpg') . ');" class="img" alt="Default image"></div>');
                          }
                          ?>
                        </div>
                        <div class="col-sm-3">
                          <?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?>
                        </div>
                        <div class="col-sm-3">
                          <?php echo metadata('item', array('Dublin Core', 'Date')); ?>
                        </div>
                        <div class="col-sm-3">
                          <?php echo metadata('item', array('Dublin Core', 'Identifier')); ?>
                        </div>

                      <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p><?php echo __("There are currently no items within this collection."); ?></p>
        <?php endif; ?>
    </div>

<?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>
<?php echo foot(); ?>
