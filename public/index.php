<?php
// Classes utilisées dans ce fichier
// Alias plus pratique de le include
use myFramework\FrontController;

// On charge l'autoloader de composer
require __DIR__.'/../vendor/autoload.php';
// require __DIR__.'/../app/Utils/DBData.php';
// On inclut les contrôleurs
// include __DIR__.'/../app/Controllers/CoreController.php';
// include __DIR__.'/../app/Controllers/MainController.php';
// On inclut les modèles
// include __DIR__.'/../app/Model/CoreModel.php';
// Front Controller
// include __DIR__.'/../app/FrontController.php';

// myFramework est l'intitulé de mon namespace déclaré dans composer autoload psr-4
$app = new FrontController();
$app->run();
