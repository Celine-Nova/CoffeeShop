<?php

namespace myFramework\Models;

use DateTime;

class CoreModel {
    
    protected $id;
    // Pour être en accord avec la base il faudrait nommer en snakecase "created_at
    // sinon dans le cas de camelCase createdAt faire des alias dans la requete sql
    protected $created_at;
    protected $updated_at; 

    // public function __construct()
    // {
       
    //     $this->created_at = new DateTime();
    //     $this->updated_at = new DateTime();
    // }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
    //  /**
    //  * Méthode qui va soit INSERT soit UPDATE
    //  */
    // public function save()
    // {
    //     // Si l'id n'est pas défini sur l'objet courant
    //     if (!isset($this->id)) {
    //         // On ajoute
    //         return $this->insert();
    //     } else {
    //         // On update
    //         return $this->update();
    //     }
    // }

    // /**
    //  * On oblige les enfants à implémenter insert et update
    //  */
    // abstract public function insert();
    // abstract public function update();

    // /**
    //  * En déclarant cette méthode abstraite
    //  * on oblige l'enfant à implémenter cette méthode
    //  * PS : on le fait ici car CoreModel ne saurait pas quoi renvoyer
    //  */
    // abstract public function jsonSerialize();

    // /**
    //  * Méthode générique d'accès à tous les enregistrements d'une table
    //  */
    // public static function findAll()
    // {
    //     // La requête (à tester dans PMA éventuellement)
    //     $sql = 'SELECT * FROM ' . static::$table . ';';
        
    //     // Demande à PDO d'éxécuter la requête
    //     // et de nous retourner un objet de type PDOStatement
    //     $pdoStatement = Database::getPDO()->query($sql);

    //     $results = $pdoStatement->fetchAll(\PDO::FETCH_CLASS, static::class);

    //     return $results;
    // }

    // public static function findById($id)
    // {
    //     // La requête (à tester dans PMA éventuellement)
    //     $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id;';

    //     $pdoStatement = Database::getPDO()->prepare($sql);
    //     $pdoStatement->bindValue(':id', $id, \PDO::PARAM_INT);
    //     $pdoStatement->execute();
        
    //     $pdoStatement->setFetchMode(
    //         \PDO::FETCH_CLASS,
    //         static::class
    //     );

    //     // C'est là que l'objet est instancié
    //     // équivaut à, par ex. : $result = new ListModel();
    //     // puis attribution des données de la BDD sur l'objet
    //     $model = $pdoStatement->fetch();

    //     return $model;
    // }
}