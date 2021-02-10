<?php
// les NAMESPACES permettent d'éviter les conflits entre les classes
// Attention c'est un antislash
namespace myFramework\Controllers;
class CoreController
{
    /**
     * @var AltoRouter
     */
    protected $router;

    /**
     * @param AltoRouter $router
     */
    public function __construct($router)
    {
        $this->router = $router;
    }

    /**
     * @param string $viewName Le nom de la vue
     * @param array $viewVars La liste des données à envoyer à la vue
     */
    protected function show($viewName, $viewVars = [])
    {
        // Je fais en sorte que mon router (ici AltoRouter) soit accessible dans mes vues de manière à pouvoir générer les URLs contenues dans mes vues avec la méthode generate d'AltoRouter
        $viewVars['router'] = $this->router;

        //dump($viewVars);

        include __DIR__ . '/../views/layout/header.tpl.php';
        // inclusion de vues
        include __DIR__ . '/../views/' . $viewName . '.tpl.php';
        include __DIR__ . '/../views/layout/footer.tpl.php';
    }
    // SIje veux renvoyer une reponse Json public function showJson($data)
    public function showJson($data)
    {
        // Je dis au navigateur que la réponse est en JSON (et non text/html comme d'habitude)
        header('Content-Type: application/json');
        // On renvoie les informations de la liste
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
}