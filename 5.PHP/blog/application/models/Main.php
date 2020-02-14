<?php

namespace app\models;

use framework\core\Model;

class Main extends Model
{
    public $rules = [
        'required' => [
            ['email'],
            ['name'],
        ],
        'email' => [
            ['email'],
        ],
    ];
}