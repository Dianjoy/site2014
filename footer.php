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

// SDK路径如 sdk/Dianjoy_android_SDK_v2.1.zip
$sdks = array();
$zipfiles = glob('../sdk/*.zip');
foreach ($zipfiles as $zip) {
  $arr = explode('/', $zip);
  $file = $arr[count($arr) - 1];
  $file = rtrim($file, '.zip');
  $parse = explode('_', $file);
  $sdks[] = array(
    'platform' => $parse[1],
    'type' => isset($parse[4]) ? $parse[4] : '广告墙',
    'version' => $parse[3],
    'url' => implode('/', array_slice($arr, 1)),
    'name' => $parse[3],
  );
}
$result = array(
  'sdks' => $sdks,
);

$template = dirname(__FILE__) . '/template/footer.html';
$template = file_get_contents($template);
echo $tpl->render($template, $result);

wp_footer();
?>