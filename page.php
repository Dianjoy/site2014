<?php

/**
 * @overview 专题页模版
 * @author Meathill <lujia.zhai@dianjoy.com>
 * @since 1.0
 */
?>
<?php
get_header();


if (have_posts()) {
  the_post();
  $result = array(
    'id' => get_the_ID(),
    'class' => join(' ', get_post_class()),
    'title' => the_title('', '', FALSE),
    'content' => str_replace(']]>', ']]&gt;', apply_filters('the_content', get_the_content())),
    'page' => wp_link_pages(array('before' => '<div class="page-links">' . __('页码：'), 'after' => '</div>', 'echo' => FALSE)),
  );
}

require_once('inc/mustache.php');
$tpl = new Mustache_Engine();

$template = dirname(__FILE__) . '/template/page.html';
$template = file_get_contents($template);
echo $tpl->render($template, $result);

get_footer();
?>