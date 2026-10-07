<?php

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//models
require_once __DIR__ . '/Model/Dish.php';

//managers
require_once __DIR__ . '/Manager/AbstractManager.php';
require_once __DIR__ . '/Manager/DishManager.php';

//controllers
require_once __DIR__ . '/Controller/AbstractController.php';
require_once __DIR__ . '/Controller/PageController.php';

//services
require_once __DIR__ . '/Service/Router.php';