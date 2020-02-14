<?php


namespace framework\core;

Use framework\core\Db;
use Valitron\Validator;


abstract class Model
{

    protected $pdo;
    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct()
    {
        $this->pdo = Db::instance();
    }

    public function load($data)
    {
        foreach ($this->attributes as $name => $value) {
            if (isset($data[$name])) {
                $this->attributes[$name] = h($data[$name]);
            }
        }
    }

    public function validate($data)
    {
        Validator::langDir(WWW . '/valitron/lang');
        Validator::lang('ru');
        $v = new Validator($data);
        $v->rules($this->rules);
        if ($v->validate()) {
            return true;
        }
        $this->errors = $v->errors();
        return false;
    }

    public function getErrors()
    {
        $errors = '<ul>';
        foreach ($this->errors as $error) {
            foreach ($error as $item) {
                $errors .= "<li>$item</li>";
            }
        }
        $errors .= '</ul>';
        return $errors;
    }

    public function save($table)
    {
        isset($this->attributes['id']) ? $tbl = \R::load($table, $this->attributes['id']) : $tbl = \R::dispense($table);
        foreach ($this->attributes as $name => $value) {
            if ($value !== '') {
                $tbl->$name = $value;
            }
        }
        return \R::store($tbl);
    }

    public function countRows($table)
    {
        return \R::count($table);
    }

    public function getRow($table, $id)
    {
        $post = \R::load($table, $id);
        if ($post) return $post;
    }

    public function getRange($table, $start, $perpage)
    {
        return \R::findAll($table, "ORDER BY id DESC LIMIT $start, $perpage");
    }

    public function getPages($table)
    {
        $total = $this->countRows($table);
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 5;
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();
        $posts = $this->getRange($table, $start, $perpage);
        return compact('posts', 'pagination');
    }
}