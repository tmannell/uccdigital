<?php if ($this->pageCount > 1): $getParams = $_GET; ?>
<div class="row pagination">
        <div class="col-sm-2">
          <?php if (isset($this->previous)): ?>

            <?php $getParams['page'] = $previous; ?>
            <a class="btn btn-default rel="prev" href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>">&laquo;</a>
          <?php else: ?>
            <div class="btn btn-default hidden">&laquo;</div>
          <?php endif; ?>
        </div>



        <form action="<?php echo html_escape($this->url()); ?>" method="get" accept-charset="utf-8">
        <?php
            $hiddenParams = array();
            $entries = explode('&', http_build_query($getParams));
            foreach ($entries as $entry) {
                if(!$entry) {
                    continue;
                }
                list($key, $value) = explode('=', $entry);
                $hiddenParams[urldecode($key)] = urldecode($value);
            }

            foreach($hiddenParams as $key => $value) {
                if($key != 'page') {
                    echo $this->formHidden($key,$value);
                }
            }

            // Manually create this input to allow an omitted ID
            $pageInput = '<div class="col-sm-4"><input class="form-control" type="text" name="page" title="'
                        . html_escape(__('Current Page'))
                        . '" value="'
                        . html_escape($this->current) . '"></div>';
        ?>
        <?php echo __('%s', $pageInput) ?>
            <div class="col-sm-3"><?php echo __('of %s', $this->last) ?></div>
        </form>





        <div class="col-sm-2">
          <?php if (isset($this->next)): ?>
            <?php $getParams['page'] = $next; ?>
            <a class="btn btn-default " rel="next" href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>">&raquo;</a>
          <?php else: ?>
            <div class="btn btn-default hidden">&raquo;</div>
          <?php endif; ?>
        </div>

</div>

<?php endif; ?>
