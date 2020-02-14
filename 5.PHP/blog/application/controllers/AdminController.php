<?php

namespace app\controllers;

use framework\core\View;

class AdminController extends AppController
{
    public $layout = 'admin';

    public function loginAction()
    {
        if (isset($_SESSION['user'])) redirect('/admin');
        if (!empty($_POST)) {
            $login = !empty($_POST['login']) ? trim($_POST['login']) : null;
            $password = !empty($_POST['password']) ? trim($_POST['password']) : null;
            jsonAnswer($this->model->login($login, $password));
            exit;
        }
        View::setMeta('Вход');
    }

    public function logoutAction()
    {
        if (isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect('/');
    }

    public function postsAction()
    {
        $this->set($this->model->getPages('posts'));
        View::setMeta('Blog:: Панель управления');
    }

    public function addAction()
    {
        if (!empty($_POST)) {
            jsonAnswer($this->model->savePost($_POST, $_FILES));
            exit;
        }
    }

    public function editAction()
    {
        if (isset($_GET['id'])) {
            $post = $this->model->getRow('posts', $_GET['id']);
            $this->set(compact('post'));
            View::setMeta('Blog:: Панель управления');
        }
        if (!empty($_POST)) {
            jsonAnswer($this->model->savePost($_GET + $_POST, $_FILES));
            exit;
        }
    }

    public function deleteAction()
    {
        if (isset($_GET['id'])) {
            if ($this->model->deletePost($_GET['id'])) {
                redirect('/admin');
            };
        }
    }
}