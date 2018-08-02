
<?php
    echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show'));
?>
<div class="container">
<?php $collection = get_collection_for_item() ?>
  <div class="row">
      <div class="col-sm-12 text-center">
          <?php if (metadata($collection, array('Dublin Core', 'Relation')) != null || trim(metadata($collection, array('Dublin Core', 'Relation'))) != ''): ?>
            <h2 class="item-title"><a title="View Fonds Description at archeion.ca" href="<?php echo metadata($collection, array('Dublin Core', 'Relation')); ?>"><?php echo metadata('item', array('Dublin Core', 'Title')); ?></a></h2>
          <?php else: ?>
            <h2><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h2>
          <?php endif; ?>
      </div>
  </div>


  <?php $images = $item->Files; $imagesCount = 1; ?>
  <?php if ($images): ?>
  <?php foreach ($images as $image): ?>
      <?php if ($imagesCount === 1): ?>

            <?php
            $path = $_SERVER['DOCUMENT_ROOT'] . "/files/versos/";
            $filename = str_replace('.', '_', metadata('item', array('Dublin Core', 'Identifier'))) . '_verso.jpg';?>

            <div class="row">
                <?php if (file_exists($path . $filename)): ?>
                <?php $height = getimagesize('/var/web/omeka.local/files/fullsize/' . $image->filename);?>
                      <div class="col-sm-6 img-height">
                          <a href="<?php echo url('/'); ?>files/original/<?php echo $image->filename; ?>"><img class="img-responsive pull-right" src="<?php echo url('/'); ?>files/original/<?php echo $image->filename; ?>" alt="<?php echo metadata('item', array('Dublin Core', 'Title')) ?>"/></a>
                      </div>
                      <div class="col-sm-6 img-height">
                          <a href="/files/versos/<?php echo $filename ?>"><img class="img-responsive pull-left verso" <?php //echo $height[3] ?> src="/files/versos/<?php echo $filename ?>" alt="Back (Verso) of <?php echo metadata('item', array('Dublin Core', 'Title')) ?>" /></a>
                      </div>
                <?php else: ?>
                      <div class="col-sm-12">
                          <a href="<?php echo url('/'); ?>files/original/<?php echo $image->filename; ?>"><img class="img-responsive img-center" src="<?php echo url('/'); ?>files/fullsize/<?php echo $image->filename; ?>" alt="<?php echo metadata('item', array('Dublin Core', 'Title')) ?>"/></a>
                      </div>
                <?php endif; ?>
            </div>

      <?php endif; ?>

  <?php $imagesCount++; endforeach; ?>
  <?php else: ?>
      <div class="no-image">No photos available.</div>
  <?php endif; ?>


    <div class="row element-set">
        <div class="col-sm-8 col-sm-offset-2">
        <div id="dublin-core-title" class="element">
          <h3><?php echo __('Title') ?></h3>
            <div class="element-text"><?php echo metadata('item', array('Dublin Core', 'Title')) ?></div>
        </div>

        <div id="dublin-core-identifier" class="element">
            <h3><?php echo __('Accession') ?></h3>
            <div class="element-text"><?php echo metadata('item', array('Dublin Core', 'Identifier')) ?></div>
        </div>

        <div id="dublin-core-creator" class="element">
            <h3><?php echo __('Fonds Name') ?></h3>
            <div class="element-text"><?php echo metadata('item', array('Dublin Core', 'Creator')) ?></div>
        </div>

        <div id="dublin-core-date" class="element">
            <h3><?php echo __('Date') ?></h3>
            <div class="element-text"><?php echo metadata('item', array('Dublin Core', 'Date')) ?></div>
        </div>

        <div id="dublin-core-rights" class="element">
            <h3><?php echo __('Rights') ?></h3>
            <div class="element-text"><?php echo metadata('item', array('Dublin Core', 'Rights')) ?></div>
        </div>

        <div id="dublin-core-format" class="element">
            <h3><?php echo __('Physical Description') ?></h3>
            <div class="element-text"><?php echo metadata('item', array('Dublin Core', 'Format')) ?></div>
        </div>

        <div id="dublin-core-type" class="element">
            <h3><?php echo __('Type') ?></h3>
            <div class="element-text"><?php echo metadata('item', 'item_type_name'); ?></div>
        </div>

        <div id="dublin-core-publisher" class="element">
            <h3><?php echo __('Statement of Responsibility') ?></h3>
            <div class="element-text">
              <?php
                if (metadata('item', array('Dublin Core', 'Publisher')) == null) {
                    echo __('N/A');
                }
                else {
                  echo metadata( 'item', array( 'Dublin Core', 'Publisher' ) );
                }
              ?>
            </div>
        </div>

        <div id="date-added" class="element">
            <h3><?php echo __('Date Added') ?></h3>
            <div class="element-text"><?php echo format_date(metadata('item', 'added')); ?></div>
        </div>

            <!-- The following returns all of the files associated with an item. -->
<!--            --><?php //if (metadata('item', 'has files')): ?>
<!--                <div id="itemfiles" class="element">-->
<!--                    <h3>--><?php //echo __('Files'); ?><!--</h3>-->
<!--                    <div class="element-text">--><?php //echo files_for_item(); ?><!--</div>-->
<!--                    --><?php //if (file_exists($path . $filename)): ?>
<!--                        <img src="/files/versos/--><?php //echo $filename ?><!--" />"-->
<!--                    --><?php //endif;?>
<!---->
<!--                </div>-->
<!--            --><?php //endif; ?>

            <!-- If the item belongs to a collection, the following creates a link to that collection. -->
            <?php if (metadata('item', 'Collection Name')): ?>
                <div id="collection" class="element">
                    <h3><?php echo __('Collection'); ?></h3>
                    <div class="element-text"><p><?php echo link_to_collection_for_item(metadata('item', 'collection_name'), array('title' => 'View Collection')); ?></p></div>
                </div>
            <?php endif; ?>

            <!-- The following prints a list of all tags associated with the item -->
            <?php if (metadata('item', 'has tags')): ?>
                <div id="item-tags" class="element">
                    <h3><?php echo __('Tags'); ?></h3>
                    <div class="element-text"><?php echo tag_string('item'); ?></div>
                </div>
            <?php endif;?>

            <!-- The following prints a citation for this item. -->
            <div id="item-citation" class="element">
                <h3><?php echo __('Citation'); ?></h3>
                <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
            </div>
        </div>
    </div>
    
    <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
    <ul class="pager">
        <li class="previous"><?php echo link_to_previous_item_show(); ?></li>
        <li class="next"><?php echo link_to_next_item_show(); ?></li>
    </ul>
</div>
<?php echo foot(); ?>
