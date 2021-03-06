<?php

namespace framework\core\base;

class View
{

    /**
     * Текущий маршрут
     * @var array
     */
    public $route = [];

    /**
     * Текущий вид
     * @var string
     */
    public $view;

    /**
     * Текущий шаблон
     * @var string
     */
    public $layout;

    /**
     * Хранилище скриптов со страницы
     * @var array
     */
    public $scripts = [];

    public static $meta = ['title' => '', 'desc' => '', 'keywords' => ''];

    public function __construct($route, $layout = '', $view = '')
    {
        $this->route = $route;
        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }
        $this->view = $view;
    }

    /**
     * Подключить вид и шаблон согласно данных маршрута
     * @param array $vars
     */
    public function render($vars)
    {
        if (is_array($vars)) {
            extract($vars);
        }
        $this->route['prefix'] = str_replace('\\','/', $this->route['prefix']);
        $file_view = APP . "/views/{$this->route['prefix']}{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if (is_file($file_view)) {
            require_once $file_view;
        } else {
            //echo "<p>Не найден вид <b>{$file_view}</b></p>";
            throw new \Exception("<p>Не найден вид <b>{$file_view}</b></p>", 404);
        }

        $content = ob_get_clean();

        if (false !== $this->layout) {
            $file_layout = APP . "/views/layouts/{$this->layout}.php";
            if (is_file($file_layout)) {
                $content = $this->getScripts($content);
                $scripts = [];
                if (!empty($this->scripts[0])) {
                    $scripts = $this->scripts[0];
                }
                require_once $file_layout;
            } else {
                //echo "<p>Не найден шаблон <b>{$file_layout}</b></p>";
                throw new \Exception("<p>Не найден шаблон <b>{$file_layout}</b></p>", 404);
            }
        }
    }

    /**
     * возвращает страницу без js скриптов
     * @param $content
     * @return string|string[]
     */
    public function getScripts($content)
    {
        $pattern = "#<script.*?>.*?</script>#si";
        preg_match_all($pattern, $content, $this->scripts);
        if (!empty($this->scripts)) {
            $content = preg_replace($pattern, '', $content);
        }
        return $content;
    }

    public static function getMeta()
    {
        echo '<title>' . self::$meta['title'] . '</title>
       <meta name="description" content = "' . self::$meta['desc'] . '">
       <meta name="keywords" content = "' . self::$meta['keywords'] . '">';
    }

    public static function setMeta($title = '', $desc = '', $keywords = '')
    {
        self::$meta['title'] = $title;
        self::$meta['desc'] = $desc;
        self::$meta['keywords'] = $keywords;
    }

    public function getPart($file)
    {
        $file = APP . "/views/{$file}.php";
        if (is_file($file)) {
            require_once $file;
        } else {
            throw new \Exception("<p>Не найден шаблон <b>{$file}</b></p>", 404);
        }
    }
}