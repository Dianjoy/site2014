<?php

/**
 * @overview 通用底部
 * @author Meathill <lujia.zhai@dianjoy.com>
 * @since 1.0
 */
?>
<?php
require_once('inc/mustache.php');
$tpl = new Mustache_Engine();

$channel = $_GET['channel'];
$result = [
  'channel' => $channel,
];
$template = dirname(__FILE__) . '/template/footer.html';
$template = file_get_contents($template);
echo $tpl->render($template, $result);

wp_footer();
?>