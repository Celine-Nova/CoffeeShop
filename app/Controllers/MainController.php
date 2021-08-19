<?php
// Attention c'est un antislash
namespace myFramework\Controllers;

use myFramework\Utils\DBData;
use myFramework\Models\ProductModel;

class MainController extends CoreController {
    
    public function mentionsLegales()
    {
        $this->show('layout/mentions-legales');
    }
   
   
}