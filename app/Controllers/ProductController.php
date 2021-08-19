<?php
namespace myFramework\Controllers;
use myFramework\Models\ProductModel;
use myFramework\Utils\DBData;

class ProductController extends CoreController {

    public function home()
    {
        $dbData = new DBData();
      
        $this->show('home',[
            'title' => "accueil",
            'products'=>$dbData->getProducts()
            
        ]);
            
    
    }
    public function getProductById($params)
    {
        $product = ProductModel::getProductById($params['id']);
          
        $this->show('detail-product',[
            'title' => 'Détail du produit '.$params['id'],
            'product' => $product
            
        ]);    
    }

}