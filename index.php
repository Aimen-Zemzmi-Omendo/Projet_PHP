<?php
$requestedPage = '/';

if (isset($_SERVER['REQUEST_URI'])) {
    $requestedPage = explode('?', $_SERVER['REQUEST_URI']);
}

require_once __DIR__ . '/Controller/Controller.php';
getController();
