<?php

/**
 * @overview 文章列表
 * @author Meathill <lujia.zhai@dianjoy.com>
 * @since 1.0
 */
get_header(); ?>

<?php
// 生成列表
if (have_posts()) {
  $blog = array();
  while (have_posts()) {
    the_post();
    $blog[] = array(
      'class' => join(' ', get_post_class($class, $post_id)),
      'title' => the_title('', '', FALSE),
      'full_title' => the_title_attribute(array('echo' => FALSE)),
      'link' => apply_filters('the_permalink', get_permalink()),
      'date' => apply_filters('the_time', get_the_time('Y-m-d'), 'Y-m-d'),
      'excerpt' => apply_filters('the_excerpt', get_the_excerpt()),
      'thumbnail' => get_the_post_thumbnail(),
    );
  }
}

// 生成翻页
$max_page = $wp_query->max_num_pages;
$cur_page = isset($curpage) ? $curpage : 1;
$next_page = $cur_page + 1;

// 整理输出
$result = array(
  'category' => single_cat_title('', false),
  'description' => category_description(),
  'blog' => $blog,
  'pages' => $wp_query->max_num_pages > 1 ? array(
    'prev' => $next_page <= $max_page ? next_posts($next_page, false) : NULL,
    'next' => $cur_page > 1 ? previous_posts(false) : NULL,
  ) : NULL,
);

require_once('inc/mustache.php');
$tpl = new Mustache_Engine();

$template = dirname(__FILE__) . '/template/category.html';
$template = file_get_contents($template);
echo $tpl->render($template, $result);

?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
