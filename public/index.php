<?php
// On charge l'autoloader de composer
require __DIR__.'/../vendor/autoload.php';

// On inclut les contrôleurs
require __DIR__.'/../app/Controllers/CoreController.php';
require __DIR__.'/../app/Controllers/MainController.php';
// On inclut les modèles


// dump($_SERVER);

// On crée un objet $router avec AltoRouter
$router = new AltoRouter();
// La clé BASE_URI a été créée via le .htaccess
$router->setBasePath($_SERVER['BASE_URI']);
// On utilise cet objet pour mapper les routes et les associer à nos contrôleurs
// MainController#home => Controller#method
// 'home' => nom de la route

// MAINCONTROLLER
$router->map('GET','/','MainController#home', 'home');

// $router->map('GET','/mentions-legales', 'MainController#mentionsLegales', 'mentions-legales');

/* Match the current request */
$match = $router->match();

// dump($match);
if($match !== false) {
    // Je sépare les 2 parties se trouvant dans "target" ('MainController#home')
    $controllerAndMethod = explode('#', $match['target']);
    // dump($controllerAndMethod); // debug

    // Je stocke les noms dans des variables
    $controllerName = $controllerAndMethod[0];
    // echo '<br>$controllerName='.$controllerName.'<br>';
    $methodName = $controllerAndMethod[1];

    // J'instancie le controller
    // PHP va remplacer la variable $controllerName par sa valeur
    // puis va instancier la bonne classe "new MainController()" par exemple
    $controller = new $controllerName();

    // J'appelle la méthode correspond à la route
    // PHP va remplacer la variable $methodName par sa valeur
    // puis va appeler la bonne méthode "->home()" par exemple
    // On passe en argument le tableau des paramètres dynamiques de la route matchée
    $controller->$methodName($match['params']);
} else {
    // Si aucun match n'a été trouvé par AltoRouter,
    // On envoie la page 404
    $controller = new MainController();
    $controller->notFound();
}
