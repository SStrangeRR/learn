<?php

error_reporting(-1);

use vendor\core\Router;

if (isset($_SERVER['QUERY_STRING'])) {
    $query = rtrim($_SERVER['QUERY_STRING'], '/');
} else {
    $query = '';
}

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');
define('LAYOUT', 'default');

require_once '../vendor/libs/functions.php';

spl_autoload_register(function ($class) {
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// custom routes
Router::add('^page/(?P<alias>[a-z-]+)?$', ['controller' => 'Page', 'action' => 'view']);

// default routes
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);