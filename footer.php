<?php

/**
 * @overview 通用底部
 * @author Meathill <lujia.zhai@dianjoy.com>
 * @since 1.0
 */
?>
<?php

$template = dirname(__FILE__) . '/template/footer.html';
$template = file_get_contents($template);
echo $template;

wp_footer();
?>