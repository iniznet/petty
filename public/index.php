<?php

define('BASE_PATH', dirname(__DIR__, 1));
define('APP_PATH', BASE_PATH . '/app');
define('RESOURCES_PATH', BASE_PATH . '/resources');
define('PUBLIC_PATH', BASE_PATH . '/public');
define('STORAGE_PATH', BASE_PATH . '/storage');
define('CONFIG_PATH', BASE_PATH . '/config');
define('ROUTES_PATH', BASE_PATH . '/routes');

require_once BASE_PATH . '/vendor/autoload.php';
require_once BASE_PATH . '/routes/api.php';
require_once BASE_PATH . '/routes/web.php';

$app = new \Petty\Petty();
$app->boot();
