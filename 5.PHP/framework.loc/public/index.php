<?php

use framework\core\Router;

if (isset($_SERVER['QUERY_STRING'])) {
    $query = rtrim($_SERVER['QUERY_STRING'], '/');
} else {
    $query = '';
}

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/framework/core');
define('ROOT', dirname(__DIR__));
define('LIBS', dirname(__DIR__) . '/vendor/framework/libs');
define('APP', dirname(__DIR__) . '/app');
define('CACHE', dirname(__DIR__) . '/tmp/cache');
define('LAYOUT', 'blog');
define('DEBUG', 1);

require_once LIBS . '/functions.php';
require __DIR__ . '/../vendor/autoload.php';

new framework\core\App();

// custom routes
Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
Router::add('^page/(?P<alias>[a-z-]+)?$', ['controller' => 'Page', 'action' => 'view']);

// default routes
Router::add('^admin$', ['controller' => 'User', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);

