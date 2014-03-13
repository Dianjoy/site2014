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
  $meta = get_post_meta( get_the_ID());
  //echo $meta["version"][0];
  //var_dump($meta);
  $id = get_the_ID();
  $result = array(
    'home_url' => esc_url(home_url('/')),
    'class' => join(' ', get_post_class()),
    'title' => the_title('', '', FALSE),
    'content' => str_replace(']]>', ']]&gt;', apply_filters('the_content', get_the_content())),
    'version' => get_post_meta($id, 'version', true),
    'description' => get_post_meta($id, 'description', true),
    'publish_date' => get_post_meta($id, 'publish_date', true),
    'doc_url' => get_post_meta($id, 'doc_url', true),
    'download_url' => get_post_meta($id, 'download_url', true),
  );
}
require_once('inc/mustache.php');
$tpl = new Mustache_Engine();

$template = dirname(__FILE__) . '/template/download.html';
$template = file_get_contents($template);
echo $tpl->render($template, $result);


get_footer();
?>
