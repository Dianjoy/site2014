<?php

/**
 * @overview 首页
 * @author Meathill <lujia.zhai@dianjoy.com>
 * @since 1.0
 */
?>
<?php
// 引用包含通用导航和前端框架的头部
get_header();


require_once('inc/mustache.php');
$tpl = new Mustache_Engine();

$template = dirname(__FILE__) . '/template/index.html';
$template = file_get_contents($template);
echo $tpl->render($template, $result);
?>