<?php

declare(strict_types=1);

session_start();

require_once 'bootstrap.php';

$router = new Router;
$router->handleRequest($_GET);