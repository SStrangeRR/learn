<?php

namespace app\controllers;

use framework\core\base\Controller;

class AppController extends Controller
{

    /**
     * @var array Меню для страницы
     */
    public $menu;

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
        new \app\models\Main();
        $this->menu = \R::findAll('category');
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