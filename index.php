<?php

/**
 * @overview 首页
 * @author Meathill <lujia.zhai@dianjoy.com>
 * @since 1.0
 */
?>
<?php
// 引用包含通用导航和前端框架的头部
get_header();

$result = array();
// 读取公司新闻
if (have_posts()) {
  $blog = array();
  $count = 0;
  while (have_posts()) {
    the_post();
    $blog[] = array(
      'class' => join(' ', get_post_class($class, $post_id)),
      'title' => the_title('', '', FALSE),
      'full_title' => the_title_attribute(array('echo' => FALSE)),
      'link' => apply_filters('the_permalink', get_permalink()),
      'date' => apply_filters('the_time', get_the_time('Y-m-d'), 'Y-m-d'),
      'excerpt' => apply_filters('the_excerpt', get_the_excerpt()),
      'thumbnail' => get_the_post_thumbnail(null, 'homepage-posts'),
    );
    $count ++;
    if ($count >= 2) {
      break;
    }
  }
  $result['blog'] = $blog;
} else {
  $noblog = array(
    'class' => '',
    'content' => '暂时没有新闻',
  );
  $result['noblog'] = $noblog;
}

// 读取业内评价
$result['feedback'] = array();
$args = array('post_type' => 'feedback', 'orderby' => 'rand', 'posts_per_page' => '1');
$feedbacks = new WP_Query($args);
while ($feedbacks->have_posts()) {
  $feedbacks->the_post();
  $content = get_the_content();
  $content = apply_filters('the_content', $content);
  $result['feedback'][] = array(
    'content' => $content,
    'thumbnail' => get_the_post_thumbnail(),
  ); 
}
// 读取合作伙伴
$result['partner'] = array();
$args = array('post_type' => 'partner', 'posts_per_page' => 20);
$partners = new WP_Query($args);
while ($partners->have_posts()) {
  $partners->the_post();
  $result['partner'][] = array(
    'title' => the_title('', '', FALSE),
    'url' => get_the_content(),
    'thumbnail' => get_the_post_thumbnail(null, 'homepage-partners'),
  ); 
}

require_once('inc/mustache.php');
$tpl = new Mustache_Engine();

$template = dirname(__FILE__) . '/template/index.html';
$template = file_get_contents($template);
echo $tpl->render($template, $result);

// 引用公共脚部
get_footer();
?>