<?php
$pageTitle = __('Browse Items');
echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>
    <div class="container-correction container">
        <h2><?php echo 'Browse all items'; ?></h2>
        <div class="row">
          <?php $subnav = ucc_digital_public_nav_items(); echo $subnav->setUlClass('nav nav-pills'); ?>
        </div>

        <div class="browse-items">
            <?php if ($total_results > 0): ?>
            <?php
            $sortLinks[__('Title')] = 'Dublin Core,Title';
            $sortLinks[__('Date')] = 'Dublin Core,Date';
            $sortLinks[__('Identifier')] = 'Dublin Core,Identifier';
            ?>
            <div class="browse-items-header hidden-xs">
                <div class="row">
                    <div class="col-sm-3">
                        <h4>Item</h4>
                    </div>
                    <div class="col-sm-3">
                        <h4><?php echo browse_sort_links(array('Title'=>'Dublin Core,Title'), array('')); ?></h4>
                    </div>
                    <div class="col-sm-3">
                        <h4><?php echo browse_sort_links(array('Date'=>'Dublin Core,Date'), array('')); ?></h4>
                    </div>
                    <div class="col-sm-3">
                      <h4><?php echo browse_sort_links(array('Identifier'=>'Dublin Core,Identifier'), array('')); ?></h4>
                    </div>
                </div>
            </div>

            <?php foreach (loop('items') as $item): ?>
            <div class="item">
                <div class="row item-row">
                    <div class="col-sm-3">
                        <?php $image = $item->Files; ?>
                        <?php if ($image) {
                                echo link_to_item('<img class="image" src="' . file_display_url($image[0], 'thumbnail') . '" alt="' . metadata('item', array('Dublin Core', 'Title')) .'" />', array('title' => 'View Item'));
                            }
                            else {
                                echo link_to_item('<div style="background-image: url(' . img('defaultImage@2x.jpg') . ');" class="img" alt="Default Image"></div>');
                            }
                        ?>
                    </div>
                    <div class="col-sm-3">
                        <?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink', 'title' => 'View Item')); ?>
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
            <?php else : ?>
                <p><?php echo 'No items added, yet.'; ?></p>
            <?php endif; ?>
        </div>
        <?php echo pagination_links(); ?>
        <?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>
    </div>
<?php echo foot(); ?>
