<?php

namespace app\controllers;

use framework\core\base\View;

class PageController extends AppController
{

    public function viewAction()
    {
        $menu = $this->menu;
        $title = 'Страница';
        View::setMeta('Cтраница', 'Описание страницы', 'Ключевые слова');
        $this->set(compact('title', 'menu'));
    }

}