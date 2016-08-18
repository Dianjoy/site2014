<?php
define('WP_USE_THEMES', false);
require('../../../wp-load.php');
query_posts('showposts=4&tag=kaifazhegonggao');
if (have_posts()) {
  $announcements = array();
  while (have_posts()) {
    the_post();
    $announcements[] = array(
      'title' => the_title('', '', FALSE),
      'date' => apply_filters('the_time', get_the_time('m.d'), 'm.d'),
      'permalink' => apply_filters('the_permalink', get_permalink())
    );
  }
}
?>