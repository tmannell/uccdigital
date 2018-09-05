<?php 
require_once dirname(__FILE__) . '/functions.php';

function ucc_digital_public_nav_items(array $navArray = null, $maxDepth = 0)
{
  if (!$navArray) {
    $navArray = array(
      array(
        'label' => __('Browse All'),
        'uri' => url('items/browse'),
      ));
    if (total_records('Tag')) {
      $navArray[] = array(
        'label' => __('Browse by Tag'),
        'uri' => url('items/tags')
      );
    }
    $navArray[] = array(
      'label' => __('Advanced Search'),
      'uri' => url('items/search')
    );
  }
  return nav($navArray, 'public_navigation_items');
}
