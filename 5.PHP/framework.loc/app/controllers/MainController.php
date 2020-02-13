<?php

namespace app\controllers;

use app\models\Main;
use framework\core\App;
use framework\core\base\View;
use framework\libs\Pagination;

class MainController extends AppController
{

    /**
     * @var string Шаблон по умолчанию
     */
    public $layout = '';

    public function indexAction()
    {
        $model = new Main;

        $total = \R::count('posts');
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 2;

        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $posts = \R::findAll('posts', "LIMIT $start, $perpage");

        View::setMeta('Blog:: Главная страница', 'Описание страницы', 'Ключевые слова');
        $this->set(compact('posts', 'pagination'));
    }

    public function testAction()
    {
        if ($this->isAjax()) {
            $model = new Main();
            $post = \R::findOne('posts', "id = {$_POST['id']}");
            $this->loadView('_test', compact('post'));
            die;
        }
        echo 222;
    }

}