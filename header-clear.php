<?php

/**
 * @overview 通用头部，包括导航和前端框架
 * @author Meathill <lujia.zhai@dianjoy.com>
 * @since 1.0
 */
?>
<?php
require_once('inc/mustache.php');
$tpl = new Mustache_Engine();

global $page, $paged;
$pagenum = $page > 2 || $paged > 2 ? ' | ' . sprintf(__('第 %s 页'), max($paged, $page)) : '';
$nav = array(
  'container_class' => 'span9',
  'echo' => FALSE,
  'theme_location' => 'primary',
  'menu_class' => 'menu pull-right',
);

// 提取描述和关键词
$tags = '';
if (is_single()) {
  $description = apply_filters('the_excerpt', get_the_excerpt());
  $post_tags = get_the_terms(0, 'post_tag');
  $tags = ',';
  foreach ($post_tags as $tag) {
    $tags .= $tag->name . ',';
  }
  $tags = substr($tags, 0, -1);
}

$result = array(
  'title' => wp_title('|', FALSE, 'right') . get_bloginfo('name') . $pagenum,
  'description' => $description ? $description : get_bloginfo('description'),
  'keywords' => $tags,
  'pingback' => get_bloginfo('pingback_url'),
  'home_url' => esc_url(home_url('/')),
  'name' => get_bloginfo('name'),
  'name_title' => esc_attr(get_bloginfo('name', 'display')),
  'nav' => wp_nav_menu($nav),
  'css' => 'style.css',
);

// 为了保证wp_head的输出
$template = dirname(__FILE__) . '/template/header.html';
$template = file_get_contents($template);
echo $tpl->render($template, $result);
?>