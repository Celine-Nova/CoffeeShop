<?php
namespace myFramework\Controllers;

use myFramework\Utils\DBData;
use myFramework\Models\ProductModel;
Class AdminController extends CoreController {
    // Formulaire d'ajout de produits
public function formAddProduct()

{
    $this->show('form-add-product',[
        'title' => "Ajout produit"
    ]);
        
}
// Fonction d'ajout d'un produit dans BDD depuis le formulaire et la requete dans fichier DBData
public function addProduct(){

    $dbData= new DBData;
    $dbData->addProduct();

    header('Location: ' . $_SERVER['BASE_URI'] . '/');

}
// Récupération de tous les produits
public function getListProducts(){
    // Methode 2 POO static::class
    $dbData = new DBData;
    $listProducts = ProductModel::getListProducts();
    // dump($listProducts);
    $this->show('admin',[
        'title' => "tous produits",
        'listProducts'=> $listProducts

    ]);   
}
// Formulaire de modification d'un produits
public function formEditProduct($params)
{
    $product = ProductModel::getProductById($params['id']);
    // $id = $product->getId();
    // dump($id);
    $this->show('form-update-product',[
        'title' => "modifproduit",
        // 'id' =>$id
        'product' => $product
    ]);
}
// Modification d'un produit
public function editProduct($params)
{
    $product = ProductModel::updateProduct($params['id']);
    // Après traitement je redirige vers la route Admin
    header('Location: ' . $_SERVER['BASE_URI'] . '/admin');
 
}

// Suppression d'un produit
public function deleteProduct($params)
{
    $product = ProductModel::deleteProduct($params['id']);
    header('Location: ' . $_SERVER['BASE_URI'] . '/admin');
      
           
}

}