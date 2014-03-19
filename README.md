dian2014
========

2014年官网新改版

### 后台设置

在wp-config.php中添加设置
``` php
define('WP_HOME','http://site.dianjoy.com:8080');
define('WP_SITEURL','http://site.dianjoy.com:8080');
// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'wordpress');

/** MySQL数据库用户名 */
define('DB_USER', 'chemzqm');

/** MySQL数据库密码 */
define('DB_PASSWORD', '********');

/** MySQL主机 */
define('DB_HOST', 'localhost:3305');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');
```
