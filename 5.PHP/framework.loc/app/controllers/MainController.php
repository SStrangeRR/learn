<?php

namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{

    public $layout = 'default';

    public function indexAction()
    {
        $model = new Main;

        $posts = \R::findAll('posts');
        $menu = $this->menu;

        $this->setMeta('Главная страница', 'Описание страницы', 'Ключевые слова');
        $meta = $this->meta;
        $this->set(compact('posts', 'menu', 'meta'));
    }

    public function testAction()
    {

    }

}