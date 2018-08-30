<?php
    $string = search_filters();
    preg_match('/.*\<li\>Query\:\s(.*)\<\/li\>/', $string, $matches);
    $pageTitle = __('Search') . ' <em>' . $matches[1] . '</em> ' . __('(%s total)', $total_results);
    echo head(array('title' => $pageTitle, 'bodyclass' => 'search'));
    $searchRecordTypes = get_search_record_types();
?>
<div class="container container-correction">
    <h2><?php echo $pageTitle; ?></h2>
    <?php if ($total_results): ?>
        <div class="search-results">

            <div class="browse-items-header hidden-xs">
                <div class="row">
                    <div class="col-sm-3">
                        <h4>Item</h4>
                    </div>
                    <div class="col-sm-3">
                        </h4>Title</h4>
                    </div>
                    <div class="col-sm-3">
                        <h4>Date</h4>
                    </div>
                    <div class="col-sm-3">
                        <h4>Identifier</h4>
                    </div>
                </div>
            </div>

                <?php $filter = new Zend_Filter_Word_CamelCaseToDash; ?>
                <?php foreach (loop('search_texts') as $searchText): ?>
                <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
                <?php $recordType = $searchText['record_type']; ?>
                <?php set_current_record($recordType, $record); ?>
                <div class="item">
                    <div class="row item-row">
                        <div class="col-sm-3">
                          <?php if ($recordImage = record_image($recordType, 'thumbnail', ['alt' => $searchText['title'], 'title' => 'View Record'])): ?>
                            <?php echo link_to($record, 'show', $recordImage, array('class' => 'image')); ?>
                          <?php endif; ?>
                        </div>
                        <div class="col-sm-3">
                            <a alt="$searchText['title]" title="View Record" href="<?php echo record_url($record, 'show'); ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a>
                        </div>
                        <div class="col-sm-3">
                          <?php echo metadata('item', array('Dublin Core', 'Date')) ? metadata('item', array('Dublin Core', 'Date')) : '[Unknown]' ; ?>
                        </div>
                        <div class="col-sm-3">
                          <?php echo metadata('item', array('Dublin Core', 'Identifier')) ? metadata('item', array('Dublin Core', 'Identifier')) : '[Unknown]' ; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

        </div>
        <?php echo pagination_links(); ?>
    <?php else: ?>
        <p><?php echo __('Your query returned no results.');?></p>
    <?php endif; ?>
</div>
<?php echo foot(); ?>