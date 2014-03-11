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
function translate_menu($menu_items) {
  foreach ($menu_items as &$item) {
    $en_title = substr($item->url, strrpos($item->url, '/') + 1, strrpos($item->url, '.'));
    if (strpos($en_title, '.') !== FALSE) {
      $en_title = substr($en_title, 0, strrpos($en_title, '.'));
    }
    $en_title = $en_title ? ucfirst($en_title) : 'Home';
    $item->title = $en_title;
  }
  
  return $menu_items;
}
?>
<?php
$is_en = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) && stripos($_SERVER['HTTP_ACCEPT_LANGUAGE'], 'en') !== FALSE;
if ($is_en || isset($_REQUEST['lang']) && $_REQUEST['lang'] == 'en') {
  add_filter('wp_nav_menu_objects', 'translate_menu');
}
$lang = '-en';

add_filter('dianjoy_custom_css', 'add_aboard_css');
get_header();

readfile(dirname(__FILE__) . '/template/aboard' . $lang . '.html');

get_footer();
?>
