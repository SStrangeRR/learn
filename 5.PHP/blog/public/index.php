<?php

use framework\core\Router;

if (isset($_SERVER['QUERY_STRING'])) {
    $query = rtrim($_SERVER['QUERY_STRING'], '/');
} else {
    $query = '';
}

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/base/core');
define('ROOT', dirname(__DIR__));
define('LIBS', dirname(__DIR__) . '/vendor/base/libs');
define('APP', dirname(__DIR__) . '/application');
define('CACHE', dirname(__DIR__) . '/tmp/cache');
define('LAYOUT', 'default');
define('DEBUG', 1);

require_once LIBS . '/functions.php';
require __DIR__ . '/../vendor/autoload.php';

new framework\core\App;

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^contacts$', ['controller' => 'Main', 'action' => 'contacts']);
Router::add('^about$', ['controller' => 'Main', 'action' => 'about']);
Router::add('^admin$', ['controller' => 'Admin', 'action' => 'posts']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);

