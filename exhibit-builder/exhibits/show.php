<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>
<div class="container exhibit-container exhibit-container-correction">

    <div class="row">
        <div class="col-sm-8 exhibit-info-col">
            <div class="row">
                <h2 class="exhibition-title"><?php echo metadata('exhibit_page', 'title'); ?></h2>
            </div>

            <div class="row" id="exhibit-blocks">
              <?php exhibit_builder_render_exhibit_page(); ?>
            </div>
        </div>

        <div class="col-sm-4 exhibit-side">
            <nav class="nav-sidebar" id="exhibit-pages">
              <?php
              $pageTree = exhibit_builder_page_tree();
              if ($pageTree):
                ?>
                <?php echo $pageTree; ?>
              <?php endif; ?>
            </nav>
        </div>
    </div>
</div>

<div class="container exhibit-container exhibit-container-correction">
    <div class="row">
        <div class="col-sm-8 exhibit-info-col">
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
        <div class="col-sm-4 exhibit-side"></div>
    </div>
</div>

<?php echo foot(); ?>
