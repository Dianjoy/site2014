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
  'echo' => FALSE,
  'theme_location' => 'primary',
  'menu_class' => 'nav navbar-nav navbar-right',
  'container_id' => 'main-menu',
  'container_class' => 'collapse navbar-collapse',
);

//非首页加入登录注册导航链接
$not_index = $_SERVER['REQUEST_URI'] != '/';
if ($not_index) {
  $login = '<li><a href="https://dev.dianjoy.com/login.php">开发者登录</a></li>';
  add_filter('wp_nav_menu_items', function ( $items ) use ( $login ) {
    return $items . $login;
  });
}

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

$home_url = esc_url(home_url('/', is_ssl() ? 'https' : 'http'));
$result   = array(
  'title' => wp_title('|', FALSE, 'right') . get_bloginfo('name') . $pagenum,
  'description' => $description ? $description : get_bloginfo('description'),
  'keywords' => $tags,
  'pingback' => get_bloginfo('pingback_url'),
  'home_url' => $home_url,
  'theme_url' => str_replace($home_url, '', get_theme_root_uri()) . '/' . get_template(),
  'name' => get_bloginfo('name'),
  'name_title' => esc_attr(get_bloginfo('name', 'display')),
  'nav' => wp_nav_menu($nav),
  'css' => 'css/style.css',
  'body_class' => join( ' ', get_body_class( ) ),
);

// 为了保证wp_head的输出
$template = dirname(__FILE__) . '/template/header.html';
$template = file_get_contents($template);
echo $tpl->render($template, $result);
?>
