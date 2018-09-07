<div class="field">
  <?php echo $this->formLabel('exhibit', __('Search by Exhibit')); ?>

  <div class="inputs">
    <?php echo $this->formSelect('exhibit', @$_GET['exhibit'], array('class' => 'form-control'), get_table_options('Exhibit')); ?>
  </div>
</div>