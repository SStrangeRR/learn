<?php

namespace vendor\core;


class Router
{

    /**
     * Таблица маршрутов
     * @var array
     */
    protected static $routes = [];

    /**
     * Текущий маршрут
     * @var array
     */
    protected static $route = [];

    /**
     * Добавляет маршрут в таблицу маршрутов
     * @param string $regexp регулярное выражение маршрута
     * @param array $route маршрут ([controller,action,params])
     */
    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    /**
     * Возвращает таблицу маршрутов
     * @return array
     */
    public static function getRoutes()
    {
        return self::$routes;
    }

    /**
     * Возвращает текущий маршрут (controller,action,[params])
     * @return array
     */
    public static function getRoute()
    {
        return self::$route;
    }

    /**
     * Ищет URL в таблице маршрутов
     * @param string $url входящий URL
     * @return bool
     */
    protected static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#$pattern#i", $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $route[$key] = $value;
                    }
                }
                if (!isset($route['action'])) {
                    $route['action'] = 'index';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /**
     *  Перенаправляет URL по корректному маршруту
     * @param string $url входящий URL
     * @return void
     */
    public static function dispatch($url)
    {
        $url = self::removeQueryString($url);
        if (self::matchRoute($url)) {
            $controller = 'app\controllers\\' . self::$route['controller'] . 'Controller';
            if (class_exists($controller)) {
                $cObj = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if (method_exists($cObj, $action)) {
                    $cObj->$action();
                    $cObj->getView();
                } else {
                    throw new \Exception("Метод <b>$controller::$action</b> не найден", 404);
                }
            } else {
                throw new \Exception("Контроллер <b>$controller</b> не найден", 404);
            }
        } else {
            throw new \Exception('Страница не найдена', 404);
        }
    }

    /**
     * Преобразует имя контроллера в CamelCase
     * @param string $name
     * @return string|string[]
     */
    protected static function upperCamelCase($name)
    {

        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));

    }

    protected static function lowerCamelCase($name)
    {

        return lcfirst(self::upperCamelCase($name));

    }

    /**
     * Удаляет GET-параметры из URL
     * @param string $url
     * @return string
     */
    protected static function removeQueryString($url)
    {

        if ($url) {
            $params = explode('&', $url, 2);
            if (false === strpos($params[0], '=')) {
                return rtrim($params[0], '/');
            } else {
                return '';
            }
        }
        return $url;

    }

}