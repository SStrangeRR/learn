<?php

namespace app\controllers\admin;

use framework\core\base\View;

class UserController extends AdminController
{
    public function indexAction()
    {
        View::setMeta('Администрирование', "Описание раздела", "Ключевые слова");
    }

    public function testAction()
    {
        //echo __METHOD__;
    }
}