<?php

class MainController extends CoreController {
    public function home()
    {
        // $dbData = new DBData();

        $this->show('home', [
            'title' => 'Accueil',
            
            // 'homeCategories' => $dbData->getHomeCategories()
        ]);
    }
    public function mentionsLegales()
    {
        $this->show('layout/mentions-legales', [
            'title' => 'Mentions Légales'
        ]);
    }
    // public function notFound()
    // {
    //     header('HTTP/1.1 404 Not Found');
    //     $this->show('layout/error404', [
    //         'title' => 'Page inexistante - 404'
    //     ]);
    // }
}