<?php

namespace framework\core;

abstract class Controller
{
    /**
     * Текущий маршрут
     * @var array
     */
    public $route = [];

    /**
     * Текущий вид
     * @var string
     */
    public $view;

    /**
     * Текущий шаблон
     * @var string
     */
    public $layout;

    /**
     * Пользовательские данные
     * @var array
     */
    public $vars;

    /**
     * Путь для списка контроля доступа
     * @var string
     */
    public $aclPath;

    public $model;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];
        $this->aclPath = $route['controller'] . '/' . $route['action'];
    }

    /**
     *Создать вид
     */
    public function getView()
    {
        if ($this->checkACL()) {
            $vObj = new View($this->route, $this->layout, $this->view);
            $vObj->render($this->vars);
        } else {
            throw new \Exception('Доступ запрещен', 403);
        }
    }

    /**
     * Заполняет пользовательские данные
     * @param $vars
     */
    public function set($vars)
    {
        $this->vars = $vars;
    }

    public function loadView($view, $vars = [])
    {
        extract($vars);
        require APP . "/views/{$this->route['controller']}/{$view}.php";
    }

    public function checkACL()
    {
        $acl = \R::findOne('pagesACL', 'page = ? LIMIT 1', [$this->aclPath]);
        if ($acl) {
            if (isset($_SESSION['user'])) {
                if (strpos($acl, $_SESSION['user']['acl']) !== false) {
                    return true;
                }
            } else {
                if (strpos($acl, 'all') !== false) {
                    return true;
                }
            }
            return false;
        }
        throw new \Exception('Страница не найдена', 404);
    }

}