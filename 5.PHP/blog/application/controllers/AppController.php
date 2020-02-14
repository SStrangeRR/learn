<?php

namespace app\controllers;

use app\models\Admin;
use app\models\Main;
use framework\core\Controller;

class AppController extends Controller
{
     /**
     * @var array Массив мета-тегов
     */
    public $meta = [];

    /**
     * AppController constructor.
     * @param string $route Маршрут
     */
    public function __construct($route)
    {
        parent::__construct($route);
        if ($route['controller'] == 'Main') {
            $this->model = new Main;
        } elseif ($route['controller'] == 'Admin'){
            $this->model = new Admin;
        }
    }

    /**
     * @param string $title Заголовок страницы
     * @param string $desc мета описание
     * @param string $keywords мета ключевые слова
     */
    protected function setMeta($title = '', $desc = '', $keywords = '')
    {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }
}