<?php

/**
 * @authors CSS DENIT
 * @date    2023-02-16 09:54:00
 * @version ${1.0.0}
 * @description:  Config file
 * @license MIT
 * @link
 */

define('APP_NAME', 'CSS Framework');
define('APP_VERSION', '1.0.0');
define('TIMEZONE', 'America/Panama');
define('LANG', 'es_PA');
define('CHARSET', 'UTF-8');
define('CREATEOR', 'ferncastillo');
define('EMAIL', 'ferncastillo@css.gob.pa');

if (!defined('STDIN'))  define('STDIN',  fopen('php://stdin',  'rb'));
if (!defined('STDOUT')) define('STDOUT', fopen('php://stdout', 'wb'));
if (!defined('STDERR')) define('STDERR', fopen('php://stderr', 'wb'));



define('PROTOCOL', strtolower(explode('/', $_SERVER['SERVER_PROTOCOL'])[0]));
define('DEBUG', $_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1' ? true : false);
define('APP_ENV', DEBUG ? 'dev' : 'prod');
define('APP_URL', PROTOCOL . '://' . $_SERVER['HTTP_HOST'] . ($_GET['url'] ? str_replace($_GET['url'], '', $_SERVER['REQUEST_URI']) : $_SERVER['REQUEST_URI']));
define('APP_PUBLIC', APP_URL . 'public/');

// Database | mysql, pgsql, sqlite, sqlsrv
//      | CONSTANT |        DEV |       PROD |
define('DB_DRIVER', DEBUG ? 'mysql' : 'mysql');
define('DB_HOST', DEBUG ? 'localhost' : '');
define('DB_PORT', DEBUG ? '3306' : '');
define('DB_NAME', DEBUG ? 'test' : '');
define('DB_USER', DEBUG ? 'root' : '');
define('DB_PASS', DEBUG ? ''  : '');
define('DB_CHARSET', DEBUG ? 'utf8' : '');
define('DB_COLLATION', DEBUG ? 'utf8_unicode_ci' : '');
define('DB_PREFIX', DEBUG ? '' : '');

// Mail
define('MAIL_DRIVER', 'smtp');
define('MAIL_HOST', 'smtp.gmail.com');
define('MAIL_PORT', 587);
define('MAIL_USERNAME', '');
define('MAIL_PASSWORD', '');
define('MAIL_ENCRYPTION', 'tls');
define('MAIL_FROM_ADDRESS', '');
define('MAIL_FROM_NAME', '');

//path config
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__) . DS);
define('PATH_APP', ROOT . 'app' . DS);
define('PATH_APP_CONTROLLERS', PATH_APP . 'controllers' . DS);
define('PATH_APP_MODULES', PATH_APP . 'modules' . DS);
define('PATH_APP_MODELS', PATH_APP . 'models' . DS);
define('PATH_APP_VIEWS', PATH_APP . 'views' . DS);
define('PATH_APP_LIBS', PATH_APP . 'libs' . DS);
define('PATH_CONFIG', ROOT . 'config' . DS);
define('PATH_CORE', ROOT . 'core' . DS);
define('PATH_PUBLIC', ROOT . 'public' . DS);
define('PATH_PUBLIC_ASSETS', PATH_PUBLIC . 'assets' . DS);
define('PATH_STORAGE', ROOT . 'storage' . DS);


// Session
define('SESSION_NAME', md5(strtoupper(str_replace(' ', '', APP_NAME))));
define('SESSION_DRIVER', 'file');
define('SESSION_LIFETIME', 120);
define('SESSION_COOKIE', strtoupper(str_replace(' ', '', APP_NAME)));
define('SESSION_DOMAIN', null);
define('SESSION_SECURE', false);
define('PATH_STORAGE_SESSIONS', PATH_STORAGE . 'sessions' . DS);

// Cache
define('CACHE_DRIVER', 'file');
define('PATH_STORAGE_CACHE', PATH_STORAGE . 'cache' . DS);

// security
define('HASH_KEY', 'test');
define('HASH_ALGO', 'sha256');
define('HASH_COST', 10);

// log
define('LOG_DRIVER', 'file');
define('PATH_STORAGE_LOGS', PATH_STORAGE . 'logs' . DS);


// PHP init configs
ini_set('server.admin', EMAIL);
ini_set('display_errors', DEBUG ? 1 : 0);
ini_set('error_reporting', DEBUG ? E_ALL : 0);
ini_set('display_startup_errors', DEBUG ? 1 : 0);
ini_set('date.timezone', TIMEZONE);
ini_set('default_charset', CHARSET);
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);
ini_set('log_errors', 1);
ini_set('error_log', PATH_STORAGE_LOGS . date('Ymd') . '_errors.log');

// start session if not exists
if (session_status() == PHP_SESSION_NONE) {
   session_name(SESSION_NAME);
   session_set_cookie_params(SESSION_LIFETIME, PATH_STORAGE_SESSIONS, SESSION_DOMAIN, SESSION_SECURE, true);
   session_start();
   $_SESSION[SESSION_NAME] = [];
}

// config cache
if (CACHE_DRIVER == 'file') {
   if (!file_exists(PATH_STORAGE_CACHE)) {
      mkdir(PATH_STORAGE_CACHE, 0777, true);
   }
}


if (DEBUG) {
   ini_set('display_errors', 1);
   error_reporting(E_ALL);
} else {
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
}
