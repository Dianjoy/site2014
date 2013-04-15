<?php

/**
 * @overview 通用函数及注册函数
 * @author Meathill <lujia.zhai@dianjoy.com>
 * @since 1.0
 */
?>
<?php

function dian2013_setup() {
  // This theme styles the visual editor with editor-style.css to match the theme style.
  add_editor_style();

  // Adds RSS feed links to <head> for posts and comments.
  add_theme_support('automatic-feed-links');

  // This theme supports a variety of post formats.
  //add_theme_support('post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ));

  // This theme uses wp_nav_menu() in one location.
  register_nav_menu('primary', __('全站通用顶部导航'));

  /*
   * This theme supports custom background color and image, and here
   * we also set up the default background color.
   */
  add_theme_support('custom-background', array(
    'default-color' => 'F6F6F6',
  ));
}
add_action('after_setup_theme', 'dian2013_setup');
?>