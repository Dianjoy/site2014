<?php

/**
 * @overview 通用头部
 * @author Meathill <lujia.zhai@dianjoy.com>
 * @since 1.0
 */
?>
<?php
require_once('inc/mustache.php');
$tpl = new Mustache_Engine();

$nav = array(
  'container_class' => 'span9',
  'echo' => FALSE,
  'theme_location' => 'primary',
);
$result = array(
  'title' => wp_title('|', FALSE, 'right'),
  'pingback' => get_bloginfo('pingback_url'),
  'wp_head' => wp_head(),
  'home_url' => esc_url(home_url('/')),
  'name' => get_bloginfo('name'),
  'name_title' => esc_attr(get_bloginfo('name', 'display')),
  'nav' => wp_nav_menu($nav),
);

$template = dirname(__FILE__) . '/template/header.html';
$template = file_get_contents($template);
echo $tpl->render($template, $result);
?>