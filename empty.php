<?php
/*
  Template Name: 空白页
 */
/**
 * @overview 专门做出来给别的地方引用的
 * @author Meathill <lujia.zhai@dianjoy.com>
 * @since 1.0
 */
?>
<?php
ob_start();
get_header('clear');
?>

*** replace ***

<?php
get_footer('clear');

// 生成缓存
$page = ob_get_contents();
$fp = fopen('empty.html', 'w');
fwrite($fp, $page);
fclose($fp);

ob_end_flush();
?>
