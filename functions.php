<?php

/**
 * @overview 通用函数及注册函数
 * @author Meathill <lujia.zhai@dianjoy.com>
 * @since 1.0
 */
?>
<?php
/**
 * 初始化
 * 主要是为了添加菜单
 */
function dian2013_setup() {
  // This theme styles the visual editor with editor-style.css to match the theme style.
  add_editor_style();

  // Adds RSS feed links to <head> for posts and comments.
  add_theme_support('automatic-feed-links');

  // This theme supports a variety of post formats.
  //add_theme_support('post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ));

  // This theme uses wp_nav_menu() in one location.
  register_nav_menu('primary', __('primary-navi'));

  /*
   * This theme supports custom background color and image, and here
   * we also set up the default background color.
   */
  add_theme_support('custom-background', array(
    'default-color' => 'F6F6F6',
  ));
}
add_action('after_setup_theme', 'dian2013_setup');

/**
 * 添加文章类型
 * feedback 业内评价
 * partner 合作伙伴
 */
function create_post_type() {
  register_post_type('feedback',
    array(
      'labels' => array(
        'name' => '业内评价',
        'singular_name' => '业内评价',
        'all_items' => '所有评价',
      ),
      'public' => true,
      'rewrite' => array('slug' => 'feedback'),
      'description' => '用来在首页显示业内评价',
      'exclude_from_search' => true,
      'show_in_nav_menus' => false,
      'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
    )
  );
  register_post_type('partner',
    array(
      'labels' => array(
        'name' => '合作伙伴',
        'singular_name' => '合作伙伴',
        'all_items' => '所有合作伙伴',
      ),
      'public' => true,
      'rewrite' => array('slug' => 'partner'),
      'description' => '用来在首页显示合作伙伴，只有缩略图有意义',
      'exclude_from_search' => true,
      'show_in_nav_menus' => false,
      'supports' => array('title', 'thumbnail'),
    )
  );
}
add_action('init', 'create_post_type');

add_theme_support( 'post-thumbnails' ); 
?>