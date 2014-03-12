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
    $tag_str = '';
    $posttags = get_the_tags();
    if ($posttags) {
      foreach($posttags as $tag) {
        $tag_str = $tag_str.$tag->name . ' ';
      }
    }
    $blog[] = array(
      'class' => join(' ', get_post_class($class, $post_id)),
      'title' => the_title('', '', FALSE),
      'tag' => $tag_str,
      'full_title' => the_title_attribute(array('echo' => FALSE)),
      'link' => apply_filters('the_permalink', get_permalink()),
      'year' => apply_filters('the_time', get_the_time('Y'), 'Y'),
      'date' => apply_filters('the_time', get_the_time('m.d'), 'm.d'),
      'excerpt' => apply_filters('the_excerpt', get_the_excerpt()),
      'thumbnail' => get_the_post_thumbnail(),
    );
  }
}

// 生成翻页
$max_page = $wp_query->max_num_pages;
$cur_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
$next_page = $cur_page + 1;

$pages = array();
$count = 1;
$query_str = $_SERVER['QUERY_STRING'] ? '?'.$_SERVER['QUERY_STRING'] : NULL;
while ($count <= $max_page) {
  //TODO news不应该写死
  $pages[] = array(
    'num' => $count,
    'class' => $cur_page == $count ? 'active' : NULL,
    'href' => '/news/page/'.$count.$query_str,
  );
  $count++;
}
// 整理输出
$result = array(
  'category' => single_cat_title('', false),
  'description' => category_description(),
  'blog' => $blog,
  'cur_page' => $cur_page,
  'pages' => $pages
);

require_once('inc/mustache.php');
$tpl = new Mustache_Engine();

$template = dirname(__FILE__) . '/template/category.html';
$template = file_get_contents($template);
echo $tpl->render($template, $result);

?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
