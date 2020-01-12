<?php

namespace framework\core\base;

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

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];
    }

    /**
     *Создать вид
     */
    public function getView()
    {
        $vObj = new View($this->route, $this->layout, $this->view);
        $vObj->render($this->vars);
    }

    /**
     * Заполняет пользовательские данные
     * @param $vars
     */
    public function set($vars)
    {
        $this->vars = $vars;
    }

    /**
     * Проверка, является ли текущий запрос Ajax
     * @return bool
     */
    public function isAjax()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }

    public function loadView($view, $vars = [])
    {
        extract($vars);
        require APP . "/views/{$this->route['controller']}/{$view}.php";
    }

}