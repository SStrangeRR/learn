<?php

namespace framework\core;

use framework\core\ErrorHandler;

class App
{
    public static $app;

    public function __construct()
    {
        session_start();
        new ErrorHandler();
    }
}