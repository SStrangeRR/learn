<?php

namespace app\controllers;

use framework\core\View;

class MainController extends AppController
{
    /**
     * @var string Шаблон по умолчанию
     */
    public $layout = '';

    public function indexAction()
    {
        $this->set($this->model->getPages('posts'));
        View::setMeta('Blog:: Главная страница', 'Описание страницы', 'Ключевые слова');
    }

    public function contactsAction()
    {
        if (!empty($_POST)) {
            if (!$this->model->validate($_POST)) {
                jsonAnswer([
                    'title' => 'Обратная связь',
                    'text' => $this->model->getErrors(),
                    'success' => 'error',
                ]);
                exit;
            } else {
                $message = wordwrap($_POST['text'] . ' | ' . $_POST['email'], 70, "\r\n");
                mail('admin@blog.net', 'Message from ' . $_POST['name'], $message);
                jsonAnswer([
                    'text' => 'Письмо отправлено успешно',
                    'success' => 'success',
                    'reset' => '1',
                ]);
                exit;
            }
        }
        View::setMeta('Blog:: Контакты', 'Описание страницы', 'Ключевые слова');
    }

    public function aboutAction()
    {
        View::setMeta('Blog:: About me', 'Описание страницы', 'Ключевые слова');
    }

    public function postAction()
    {
        if (isset($_GET['id'])) {
            $post = $this->model->getRow('posts', $_GET['id']);
            $this->set(compact('post'));
        }
        View::setMeta('Blog:: Posts', 'Описание страницы', 'Ключевые слова');
    }
}