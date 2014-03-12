<?php
/*
Template Name: 下载中心
*/
/**
 * @overview 开发者模版
 * @author Meathill <lujia.zhai@dianjoy.com>
 * @since 1.0
 */
?>
<?php
get_header();

if (have_posts()) {
  the_post();
  $result = array(
    'home_url' => esc_url(home_url('/')),
    'id' => get_the_ID(),
    'class' => join(' ', get_post_class()),
    'title' => the_title('', '', FALSE),
    'content' => str_replace(']]>', ']]&gt;', apply_filters('the_content', get_the_content()))
  );
}
require_once('inc/mustache.php');
$tpl = new Mustache_Engine();

$template = dirname(__FILE__) . '/template/download.html';
$template = file_get_contents($template);
echo $tpl->render($template, $result);


get_footer();
?>
