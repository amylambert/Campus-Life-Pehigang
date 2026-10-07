<?php

declare(strict_types=1);

require_once 'bootstrap.php';

$router = new Router;
$router->handleRequest($_GET);