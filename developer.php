<?php
/*
Template Name: 开发者
*/
/**
 * @overview 开发者模版
 * @author Meathill <lujia.zhai@dianjoy.com>
 * @since 1.0
 */
?>
<?php
get_header();

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
  'home_url' => esc_url(home_url('/')),
  'sdks' => $sdks,
);


require_once('inc/mustache.php');
$tpl = new Mustache_Engine();

$template = dirname(__FILE__) . '/template/developer.html';
$template = file_get_contents($template);
echo $tpl->render($template, $result);


get_footer();
?>