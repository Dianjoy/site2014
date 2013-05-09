<?php
/*
Template Name: 广告主
*/
/**
 * @overview 广告主模版
 * @author Meathill <lujia.zhai@dianjoy.com>
 * @since 1.0
 */
?>
<?php
get_header();

// 读取业内评价
$feedback = array();
$args = array('post_type' => 'feedback', 'posts_per_page' => 50);
$feedbacks = new WP_Query($args);
while ($feedbacks->have_posts()) {
  $feedbacks->the_post();
  $content = get_the_content();
  $content = apply_filters('the_content', $content);
  $feedback[] = array(
    'content' => $content,
    'thumbnail' => get_the_post_thumbnail(),
  ); 
}
$result = array(
  'home_url' => esc_url(home_url('/')),
  'feedback' => $feedback,
);

// 读取合作案例
$sub_page_id = 732;
query_posts("page_id=$sub_page_id");
if (have_posts()) {
  the_post();
  $content = get_the_content();
  $content = apply_filters('the_content', $content);
  $result['case'] = $content;
}


require_once('inc/mustache.php');
$tpl = new Mustache_Engine();

$template = dirname(__FILE__) . '/template/advertiser.html';
$template = file_get_contents($template);
echo $tpl->render($template, $result);


get_footer();
?>