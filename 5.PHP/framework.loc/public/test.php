<?php

require_once 'rb.php';

$db = require '../config/config_db.php';

R::setup($db['dsn'], $db['user'], $db['pass']);
R::freeze(true);
R::fancyDebug(true);
$cat = R::findAll('category');

print_r($cat);

