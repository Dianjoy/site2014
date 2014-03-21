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


// 读取合作案例
if (have_posts()) {
  the_post();
  $result = array(
    'home_url' => esc_url(home_url('/')),
    'title' => the_title('', '', FALSE),
    'content' => get_the_content(),
  );
}


require_once('inc/mustache.php');
$tpl = new Mustache_Engine();

$template = dirname(__FILE__) . '/template/product.html';
$template = file_get_contents($template);
echo $tpl->render($template, $result);


get_footer();
?>
