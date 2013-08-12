<?php
/*
  Template Name: 进军海外
 */
/**
 * @overview 进军海外模版
 * @author Meathill <lujia.zhai@dianjoy.com>
 * @since 1.0
 */
function add_aboard_css() {
  return 'css/aboard.css';
}
?>
<?php
$lang = isset($_REQUEST['lang']) ? '-' . $_REQUEST['lang'] : '';
add_filter('custom_css', 'add_aboard_css');
get_header();

readfile(dirname(__FILE__) . '/template/aboard' . $lang . '.html');

get_footer();
?>