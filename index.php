<?php
/**
 * Project: zorcacms
 * Author: Zorca (vs@zorca.org)
 */

/**
 * [en] Zorca CMS requires PHP 5.5.0 or greater
 * [ru] Проверяем версию PHP, для работы Zorca CMS требуется версия не ниже 5.5.0
 */
version_compare(PHP_VERSION, "5.5.0", "<") and exit("Zorca CMS requires PHP 5.5.0 or greater");

/**
 * [en] Set timezone to default, falls back to system if php.ini not set
 * [ru] Устанавливаем врменную зону в дефолтное значение
 */
date_default_timezone_set(@date_default_timezone_get());

/**
 * [en] Determine the directory separator
 * [ru] Определяем разделитель директорий
 */
define('DS', '/');

/**
 * [en] Determine the base server directory
 * [ru] Определяем базовую папку сервера
 */
define('BASE', str_replace(DIRECTORY_SEPARATOR, DS, __DIR__ . DS));

/**
 * [en] Determine the app, data, extensions & public directories
 * [ru] Устанавливаем папки для приложения, базы данных, расширений и паблика
 */
define('APP', BASE . 'app' . DS);
define('DATA', BASE . 'data' . DS);
define('EXT', BASE . 'ext' . DS);
define('PUB', BASE . 'pub' . DS);

/**
 * [en] Register the auto-loader
 * [ru] Подключаем необходимые библиотеки через автозагрузчик
 */
require_once BASE . 'vendor' . DS . 'autoload.php';

/**
 * [en] Start engine
 * [ru] Запускаем движок
 */
$zorca = new Zorca\Zorca();
$zorca->run();
