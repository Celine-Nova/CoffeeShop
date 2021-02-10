<?php
namespace myFramework\Controllers;

class ErrorController extends CoreController
{
    public function notFound()
    {
        // $data = ['errorPage'=> 'page introuvable'];
        header('HTTP/1.1 404 Not Found');
        $this->show('layout/error404', ['errorPage' => 'page introuvable']);
    }
}
