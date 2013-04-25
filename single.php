<?php

/**
 * @overview 文章页
 * @author Meathill <lujia.zhai@dianjoy.com>
 * @since 1.0
 */
get_header(); ?>

<?php
// 生成列表
if (have_posts()) {
  while (have_posts()) {
    the_post();
    $blog = array(
      'id' => get_the_ID(),
      'is_featured' => is_sticky() && is_home() && ! is_paged(),
      'class' => join(' ', get_post_class($class, $post_id)),
      'title' => the_title('', '', FALSE),
      'full_title' => the_title_attribute(array('echo' => FALSE)),
      'is_search' => is_search(),
      'link' => apply_filters('the_permalink', get_permalink()),
      'date' => apply_filters('the_time', get_the_time('Y-m-d'), 'Y-m-d'),
      'excerpt' => apply_filters('the_excerpt', get_the_excerpt()),
      'content' => the_content('继续阅读'),
      'thumbnail' => get_the_post_thumbnail(),
      //'meta' => twentytwelve_entry_meta(),
    );
  }
}

require_once('inc/mustache.php');
$tpl = new Mustache_Engine();

$template = dirname(__FILE__) . '/template/single.html';
$template = file_get_contents($template);
echo $tpl->render($template, $blog);

?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
