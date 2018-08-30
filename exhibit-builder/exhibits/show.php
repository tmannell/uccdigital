<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>
<div class="container container-correction">
    <div class="row">
        <h2 class="exhibition-title"><?php echo metadata('exhibit_page', 'title'); ?></h2>
    </div>
    <div class="row" id="exhibit-blocks">
        <?php exhibit_builder_render_exhibit_page(); ?>
    </div>

    <div class="row" id="exhibit-page-navigation">
        <?php if ($prevLink = exhibit_builder_link_to_previous_page()): ?>
        <div id="exhibit-nav-prev">
        <?php echo $prevLink; ?>
        </div>
        <?php endif; ?>
        <?php if ($nextLink = exhibit_builder_link_to_next_page()): ?>
        <div id="exhibit-nav-next">
        <?php echo $nextLink; ?>
        </div>
        <?php endif; ?>
        <div id="exhibit-nav-up">
        <?php echo exhibit_builder_page_trail(); ?>
        </div>
    </div>
</div>

<div class="container">
    <nav class="row" id="exhibit-pages">
        <div class="col-sm-10 col-sm-offset-1">
            <h4 class="exhibition-tree-title"><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h4>
            <?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
        </div>
    </nav>
</div>
<?php echo foot(); ?>
