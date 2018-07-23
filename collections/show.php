<?php
    $collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
    echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show'));
?>
<h1><a href="<?php echo metadata('collection', array('Dublin Core', 'Relation')); ?>" target="_blank"><?php echo $collectionTitle; ?></a></h1>
    <div class="element-set">
        <div id="dublin-core-coverage" class="element-text">
            <h2><?php echo __('Administrative History'); ?></h2>
            <?php echo metadata('collection', array('Dublin Core', 'Coverage')); ?>
        </div>

        <div id="dublin-core-description" class="element-text">
            <h2><?php echo __('Scope and Content'); ?></h2>
            <?php echo metadata('collection', array('Dublin Core', 'Description')); ?>
        </div>

        <div id="dublin-core-relation" class="element-text">
            <h2><?php echo __('Link to fonds level description'); ?></h2>
            <a href="<?php echo metadata('collection', array('Dublin Core', 'Relation')); ?>" target="_blank"><?php echo metadata('collection', array('Dublin Core', 'Relation')); ?></a>
        </div>
    </div>

    <div id="collection-items">
        <h2><?php echo link_to_items_browse(__('Items in the %s Collection', $collectionTitle), array('collection' => metadata('collection', 'id'))); ?></h2>
        <?php if (metadata('collection', 'total_items') > 0): ?>
            <?php foreach (loop('items') as $item): ?>
                <div class="item">
                    <div class="row">
                        <div class="col-sm-3">
                          <?php $image = $item->Files; ?>
                          <?php //print '<pre>'; print_r($image[0]); print '</pre>'; ?>
                          <?php if ($image) {
                            echo link_to_item('<img class="image" src="' . file_display_url($image[0], 'thumbnail') . '" alt="' . metadata('item', array('Dublin Core', 'Title')) . '" />');
                          } else {
                            echo link_to_item('<div style="background-image: url(' . img('defaultImage@2x.jpg') . ');" class="img"></div>');
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
    </div><!-- end collection-items -->

<?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>
<?php echo foot(); ?>
