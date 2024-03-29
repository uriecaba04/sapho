<?php
// APPLICATION
define('APPLICATION', 'Admin');

// HTTP
//define('HTTP_SERVER', 'http://localhost/sapho/upload/adminmain/');
define('HTTP_SERVER', 'http://192.168.0.14/sapho/upload/adminmain/');
define('HTTP_CATALOG', 'http://localhost/sapho/upload/');

// DIR
define('DIR_OPENCART', 'C:/xampp/htdocs/sapho/upload/');
define('DIR_APPLICATION', DIR_OPENCART . 'adminmain/');
define('DIR_EXTENSION', DIR_OPENCART . 'extension/');
define('DIR_IMAGE', DIR_OPENCART . 'image/');
define('DIR_SYSTEM', DIR_OPENCART . 'system/');
define('DIR_CATALOG', DIR_OPENCART . 'catalog/');
define('DIR_STORAGE', 'C:/xampp/storage3/');
define('DIR_LANGUAGE', DIR_APPLICATION . 'language/');
define('DIR_TEMPLATE', DIR_APPLICATION . 'view/template/');
define('DIR_CONFIG', DIR_SYSTEM . 'config/');
define('DIR_CACHE', DIR_STORAGE . 'cache/');
define('DIR_DOWNLOAD', DIR_STORAGE . 'download/');
define('DIR_LOGS', DIR_STORAGE . 'logs/');
define('DIR_SESSION', DIR_STORAGE . 'session/');
define('DIR_UPLOAD', DIR_STORAGE . 'upload/');
define('DIR_DOCUMENTS', DIR_OPENCART . '/bot/documents/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'sapho');
define('DB_PORT', '3306');
define('DB_PREFIX', 'oc_');

// OpenCart API
define('OPENCART_SERVER', 'https://www.opencart.com/');
