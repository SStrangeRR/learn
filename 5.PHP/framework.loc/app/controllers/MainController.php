<?php

namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{

    public $layout = 'main';

    public function indexAction()
    {
        $model = new Main;
//        $res = $model->query("SELECT * FROM posts");
        $posts = $model->findAll();
//        $posts2 = $model->findOne('What is Lorem Ipsum?', 'title');
        $data = $model->findLike('lorem', 'title', 'posts');
        debug($data);
        $title = 'PAGE TITLE';
        $this->set(compact('title', 'posts'));
    }

}