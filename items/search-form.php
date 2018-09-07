<?php
if (!empty($formActionUri)):
    $formAttributes['action'] = $formActionUri;
else:
    $formAttributes['action'] = url(array('controller' => 'items',
                                          'action' => 'browse'));
endif;
$formAttributes['method'] = 'GET';
?>

<form <?php echo tag_attributes($formAttributes); ?>>

    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <div id="search-keywords" class="field">
                    <?php echo $this->formLabel('keyword-search', __('Search for Keywords')); ?>
                    <div class="inputs">
                    <?php
                        echo $this->formText(
                            'search',
                            @$_REQUEST['search'],
                            array('class' => 'form-control', 'id' => 'keyword-search', 'size' => '40')
                        );
                    ?>
                    </div>
                </div>
            </div>
        </div>
            <div id="search-narrow-by-fields" class="col-sm-12 row field">
                <div class="label"><?php echo __('Narrow by Specific Fields'); ?></div>
                <div class="inputs">
                <?php
                // If the form has been submitted, retain the number of search
                // fields used and rebuild the form
                if (!empty($_GET['advanced'])) {
                    $search = $_GET['advanced'];
                } else {
                    $search = array(array('field' => '', 'type' => '', 'value' => ''));
                }

                //Here is where we actually build the search form
                foreach ($search as $i => $rows): ?>
                    <div class="search-entry">
                        <?php
                        //The POST looks like =>
                        // advanced[0] =>
                        //[field] = 'description'
                        //[type] = 'contains'
                        //[terms] = 'foobar'
                        //etc
                        ?>
                        <div class="col-sm-1">
                        <?php
                        echo $this->formSelect(
                            "advanced[$i][joiner]",
                            @$rows['joiner'],
                            array(
                                'title' => __("Search Joiner"),
                                'id' => null,
                                'class' => 'advanced-search-joiner form-control'
                            ),
                            array(
                                'and' => __('AND'),
                                'or' => __('OR'),
                            )
                        );
                        ?>
                        </div>
                        <div class="col-sm-3">
                        <?php
                        echo $this->formSelect(
                            "advanced[$i][element_id]",
                            @$rows['element_id'],
                            array(
                                'title' => __("Search Field"),
                                'id' => null,
                                'class' => 'advanced-search-element form-control'
                            ),
                            get_table_options('Element', null, array(
                                'record_types' => array('Item', 'All'),
                                'sort' => 'orderBySet')
                            )
                        );
                        ?>
                        </div>
                        <div class="col-sm-3">
                        <?php
                        echo $this->formSelect(
                            "advanced[$i][type]",
                            @$rows['type'],
                            array(
                                'title' => __("Search Type"),
                                'id' => null,
                                'class' => 'advanced-search-type form-control'
                            ),
                            label_table_options(array(
                                'contains' => __('contains'),
                                'does not contain' => __('does not contain'),
                                'is exactly' => __('is exactly'),
                                'is empty' => __('is empty'),
                                'is not empty' => __('is not empty'),
                                'starts with' => __('starts with'),
                                'ends with' => __('ends with'))
                            )
                        );
                        ?>
                        </div>
                        <div class="col-sm-3">
                        <?php
                        echo $this->formText(
                            "advanced[$i][terms]",
                            @$rows['terms'],
                            array(
                                'size' => '20',
                                'title' => __("Search Terms"),
                                'id' => null,
                                'class' => 'advanced-search-terms form-control'
                            )
                        );
                        ?>
                        </div>
                    <div class="col-sm-2">
                        <button type="button" class="remove_search btn btn-default" disabled="disabled" style="display: none;"><?php echo __('Remove field'); ?></button>
                    </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-1">
            <button type="button" class="add_search btn btn-default"><?php echo __('Add a Field'); ?></button>
        </div>
    </div>
    </div>

    <div id="search-by-range" class="field">
        <?php echo $this->formLabel('range', __('Search by a range of ID#s (example: 1-4, 156, 79)')); ?>
        <div class="inputs">
        <?php
            echo $this->formText('range', @$_GET['range'],
                array('size' => '40', 'class' => 'form-control')
            );
        ?>
        </div>
    </div>

    <div class="field">
        <?php echo $this->formLabel('collection-search', __('Search By Collection')); ?>
        <div class="inputs">
        <?php
            echo $this->formSelect(
                'collection',
                @$_REQUEST['collection'],
                array('id' => 'collection-search', 'class' => 'form-control'),
                get_table_options('Collection', null, array('include_no_collection' => true))
            );
        ?>
        </div>
    </div>

    <div class="field">
        <?php echo $this->formLabel('item-type-search', __('Search By Type')); ?>
        <div class="inputs">
        <?php
            echo $this->formSelect(
                'type',
                @$_REQUEST['type'],
                array('id' => 'item-type-search', 'class' => 'form-control'),
                get_table_options('ItemType')
            );
        ?>
        </div>
    </div>

    <?php if (is_allowed('Users', 'browse')): ?>
    <div class="field">
    <?php
        echo $this->formLabel('user-search', __('Search By User'));?>
        <div class="inputs">
        <?php
            echo $this->formSelect(
                'user',
                @$_REQUEST['user'],
                array('id' => 'user-search', 'class' => 'form-control'),
                get_table_options('User')
            );
        ?>
        </div>
    </div>
    <?php endif; ?>

    <div class="field">
        <?php echo $this->formLabel('tag-search', __('Search By Tags')); ?>
        <div class="inputs">
        <?php
            echo $this->formText('tags', @$_REQUEST['tags'],
                array('size' => '40', 'id' => 'tag-search', 'class' => 'form-control')
            );
        ?>
        </div>
    </div>


    <?php if (is_allowed('Items', 'showNotPublic')): ?>
    <div class="field">
        <?php echo $this->formLabel('public', __('Public/Non-Public')); ?>
        <div class="inputs">
        <?php
            echo $this->formSelect(
                'public',
                @$_REQUEST['public'],
                array('class' => 'form-control'),
                label_table_options(array(
                    '1' => __('Only Public Items'),
                    '0' => __('Only Non-Public Items')
                ))
            );
        ?>
        </div>
    </div>
    <?php endif; ?>

    <div class="field">
        <?php echo $this->formLabel('featured', __('Featured/Non-Featured')); ?>
        <div class="inputs">
        <?php
            echo $this->formSelect(
                'featured',
                @$_REQUEST['featured'],
                array('class' => 'form-control'),
                label_table_options(array(
                    '1' => __('Only Featured Items'),
                    '0' => __('Only Non-Featured Items')
                ))
            );
        ?>
        </div>
    </div>

<?php //fire_plugin_hook('public_items_search', array('view' => $this)); ?>
    <div>
        <?php if (!isset($buttonText)) {
            $buttonText = __('Search for items');
        } ?>
        <input type="submit" class="btn btn-default submit" name="submit_search" id="submit_search_advanced" value="<?php echo $buttonText ?>">
    </div>
</form>

<?php echo js_tag('items-search'); ?>
<script type="text/javascript">
    jQuery(document).ready(function () {
        Omeka.Search.activateSearchButtons();
    });
</script>
