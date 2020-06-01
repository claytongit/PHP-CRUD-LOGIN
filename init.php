<?php

    define('DB_HOST', 'localhost');
    define('DB_NAME', 'teste');
    define('DB_USER', 'root');
    define('DB_PASS', '');

    ini_set('display_erros', true);
    error_reporting(E_ALL);

    require_once('../model/bd.php');