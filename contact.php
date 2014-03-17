<?php

/*
  Template Name: 联系我们
 */
/**
 * @overview 联系我们模版
 * @author Meathill <lujia.zhai@dianjoy.com>
 * @since 1.0
 */
?>
<?php

get_header();

$result = array(
    'home_url' => esc_url(home_url('/')),
    //'feedback' => $feedback,
);


require_once('inc/mustache.php');
$tpl = new Mustache_Engine();

$template = dirname(__FILE__) . '/template/contact.html';
$template = file_get_contents($template);
echo $tpl->render($template, $result);


get_footer();
?>
