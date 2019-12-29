<?php

namespace app\controllers;

class AppController extends \vendor\core\base\Controller
{

    public $menu;
    public $meta = [];

    /**
     * AppController constructor.
     */
    public function __construct($route)
    {
        parent::__construct($route);
        new \app\models\Main();
        $this->menu = \R::findAll('category');
    }

    protected function setMeta($title = '', $desc = '', $keywords = '')
    {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;

    }
}