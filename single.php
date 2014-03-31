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
    $tags = get_the_tags();
    $links = array();
    foreach ($tags as $tag) {
      $links[] = '<a href="/news?tag='.$tag->slug.'">'.$tag->name.'</a>';
    }
    $content = get_the_content('继续阅读');
    $blog = array(
      'id' => get_the_ID(),
      'is_featured' => is_sticky() && is_home() && ! is_paged(),
      'class' => join(' ', get_post_class($class, $post_id)),
      'full_title' => the_title_attribute(array('echo' => FALSE)),
      'is_search' => is_search(),
      'link' => apply_filters('the_permalink', get_permalink()),
      'date' => apply_filters('the_time', get_the_time('Y-m-d'), 'Y-m-d'),
      'excerpt' => apply_filters('the_excerpt', get_the_excerpt()),
      'content' => apply_filters('the_content', $content),
      'category' => get_the_category_list(' <span class="divider">/</span></li><li>'),
      'tags' => implode(' ', $links),
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
<?php echo '</div></div>' ?>
<?php get_footer(); ?>
