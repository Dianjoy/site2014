<?php
/*
Template Name: 广告产品
*/
/**
 * @overview 广告主模版
 * @author Meathill <lujia.zhai@dianjoy.com>
 * @since 1.0
 */
?>
<?php
get_header();

$result = array(
  'home_url' => esc_url(home_url('/'))
);

// 读取合作案例
$sub_page_id = 766;
query_posts("page_id=$sub_page_id");
if (have_posts()) {
  the_post();
  $content = get_the_content();
  $content = apply_filters('the_content', $content);
}


require_once('inc/mustache.php');
$tpl = new Mustache_Engine();

$template = dirname(__FILE__) . '/template/product.html';
$template = file_get_contents($template);
echo $tpl->render($template, $result);


get_footer();
?>
