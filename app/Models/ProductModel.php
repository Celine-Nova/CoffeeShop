<?php
namespace myFramework\Models;

use myFramework\Models\CoreModel;
use myFramework\Utils\DBData;
// use 
class ProductModel extends CoreModel {
    private $title;
    private $description;
    private $picture;
    private $price;

  

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }


    /**
     * R de CRUD : récupération de tous les produits Methode 2
     */
    public static function getListProducts()
    {
        // La requête (à tester dans PMA éventuellement)
        $sql = "SELECT * FROM product";
        // Demande à PDO d'éxécuter la requête et de nous retourner le résultat
        $result = DBData::getPDO()->query($sql);
        // On récupère les résultats
        //setFetchMode — Définit le mode de récupération par défaut pour cette requête
        // self::class = nom de la classe courant = 'myFramework\Models\ProductModel'
        // ProductModel->getId()
        $result->setFetchMode(\PDO::FETCH_CLASS, self::class);
        // dump($result);
        $products = $result->fetchAll();
        // dd($products);
        return $products;
    }
    // Récupération des détails d'un produit
    public static function getProductById($productId)
    {
        $sql = "SELECT * FROM product WHERE id = :id";
        // On prépare
        $pdoStatement = DBData::getPDO()->prepare($sql);
         // Assigne les valeurs via le placeholder (jeton, paramètre nommé)
        $pdoStatement->bindValue(':id', $productId, \PDO::PARAM_INT);
        $pdoStatement->execute();

        // setFetchMode — Définit le mode de récupération par défaut pour cette requête
        // $viewVars['product']->getTitle()
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS,static::class);
        $result = $pdoStatement->fetch();
        return $result;
    }
    /**
     * U de CRUD : Update Modification d'un produit
     */
    public static function updateProduct($productId){
        $sql = "UPDATE product SET
        `title` = :titleProduct,
        `description` = :descriptionProduct,
        `picture` = :pictureProduct,
        `price`= :priceProduct,
        `updated_at` = CURRENT_TIMESTAMP
         WHERE id = :id_product";
    
    // On prépare (prend en compte les placeholders)
    $pdoStatement = DBData::getPDO()->prepare($sql);
    // On associe les valeurs
    $pdoStatement->bindValue(':titleProduct', $_POST['title'], \PDO::PARAM_STR);
    $pdoStatement->bindValue(':descriptionProduct', $_POST['description'], \PDO::PARAM_STR);
    $pdoStatement->bindValue(':pictureProduct', $_POST['picture'], \PDO::PARAM_STR);
    $pdoStatement->bindValue(':priceProduct', $_POST['price'], \PDO::PARAM_INT);
    // $pdoStatement->bindValue(':updateProduct', Date('yy/m/d'), \PDO::PARAM_STR);
    // $pdoStatement->bindValue(':createProduct', Date('yy/m/d'), \PDO::PARAM_STR);
    $pdoStatement->bindValue(':id_product', $productId, \PDO::PARAM_INT);
    // echo $sql;
    // dump($pdoStatement);
    // On exécute la requête
    // $nbAffectedRows = nombre de lignes modifiées par la requête
    $nbAffectedRows = $pdoStatement->execute();

    // if ($nbAffectedRows > 0) {
    //     // En cas de réussite de la requête
    //     return true;
    // } else {
    //     // En cas d'échec ou aucune ligne modifiée
    //     return false;
    // }
    }
    /**
     * D de CRUD: Delete Suppression d'un produit
     */
    public static function deleteProduct($productId)
    {
        $sql = "DELETE FROM product WHERE id = :id";
        // On prépare
        $pdoStatement = DBData::getPDO()->prepare($sql);
        // Assigne les valeurs via le placeholder (jeton, paramètre nommé)
        $pdoStatement->bindValue(':id', $productId, \PDO::PARAM_INT);
        if ($pdoStatement->execute()) {
            echo 'Le produit  ' . $productId . ' a été supprimé avec succès.';
        } else {
            echo 'Le produit n\'a pas été supprimé';
        }

    }
}