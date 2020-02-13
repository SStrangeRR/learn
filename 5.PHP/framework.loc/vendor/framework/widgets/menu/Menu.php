<?php

namespace framework\widgets\menu;

use framework\libs\Cache;

class Menu
{
    /**
     * @var array список категорий в виде массива
     */
    protected $data;

    /**
     * @var array список категорий в виде дерева
     */
    protected $tree;

    /**
     * @var string категории, преобразованые в HTML
     */
    protected $menuHtml;

    /**
     * @var string путь к шаблону для построения меню
     */
    protected $tmpl;

    /**
     * @var string контейнер, в который оборачиваются элементы меню
     */
    protected $container = 'ul';

    protected $class = 'menu';

    /**
     * @var string таблица, на основе которой строится меню
     */
    protected $table = 'categories';


    protected $cache = 3600;
    protected $cacheKey = 'f_menu';

    public function __construct($options = [])
    {
        $this->tmpl = __DIR__ . '/menu_tmpl/menu.php';
        $this->getOptions($options);
        $this->run();
    }

    protected function getOptions($options)
    {
        foreach ($options as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    protected function output()
    {
        echo "<{$this->container} class='{$this->class}'>";
        echo $this->menuHtml;
        echo "</{$this->container}>";
    }

    protected function run()
    {
        $cache = new Cache();
        $this->menuHtml = $cache->get($this->cacheKey);
        if (!$this->menuHtml) {
            $this->data = \R::getAssoc("SELECT * FROM {$this->table}");
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);
            $cache->set($this->cacheKey, $this->menuHtml, $this->cache);
        }
        $this->output();
    }

    protected function getTree()
    {
        $tree = array();
        $data = $this->data;

        foreach ($data as $id => &$node) {
            if (!$node['parent']) {
                $tree[$id] = &$node;
            } else {
                $data[$node['parent']]['childs'][$id] = &$node;
            }
        }

        return $tree;
    }

    protected function getMenuHtml($tree, $tab = '')
    {
        $string = '';
        foreach ($tree as $id => $category) {
            $string .= $this->catToTemplate($category, $tab, $id);
        }
        return $string;
    }

    protected function catToTemplate($category, $tab, $id)
    {
        ob_start();
        require $this->tmpl;
        return ob_get_clean();
    }

}