<?php

namespace app\models;

use framework\core\FileUploader;
use framework\core\Model;

class Admin extends Model
{
    public $attributes = [
        'id' => '',
        'title' => '',
        'description' => '',
        'text' => '',
        'image' => '',
    ];

    public $rules = [
        'required' => [
            ['title'],
            ['description'],
            ['text']
        ],
    ];

    public function login($login, $password)
    {
        if ($login && $password) {
            $user = \R::findOne('users', 'name = ? LIMIT 1', [$login]);
            if ($user) {
                if (password_verify($password, $user->password)) {
                    foreach ($user as $key => $value) {
                        if ($key != 'password') $_SESSION['user'][$key] = $value;
                    }
                    return [
                        'text' => 'Успешный вход',
                        'success' => 'success',
                        'url' => 'admin',
                    ];
                }
            }
        }
        return [
            'text' => 'Неверный логин или пароль',
            'success' => 'error',
        ];
    }

    /**
     * @param array $data
     * @return array
     */
    public function savePost($data, $files)
    {
        if (!$this->validate($data)) {
            return [
                'text' => $this->getErrors(),
                'success' => 'error',
            ];
        } else {
            $this->load($data);
            if (isset($files)) {
                $fileName = FileUploader::upload($files);
                if ($fileName !== 'error') {
                    $this->load([
                        'image' => $fileName,
                    ]);
                }
            }
            if ($this->save('posts')) {
                return [
                    'text' => 'Данные успешно сохранены',
                    'success' => 'success',
                    'url' => 'admin',
                ];
            } else {
                return [
                    'text' => 'Ошибка',
                    'success' => 'error',
                ];
            }
        }
    }

    public function deletePost($id)
    {
        $post = \R::load('posts', $id);
        if ($post['image'] !== '') {
            unlink(WWW . '/images/posts/' . $post['image']);
        }
        return \R::trash($post);
    }
}