<?php

namespace myFramework\Models;
class CoreModel {
    
    protected $id;
    // Pour être en accord avec la base il faudrait nommer en snakecase "created_at
    protected $createdAt;
    protected $updatedAt; 

    public function __construct($sqlResults)
    {
        $this->id = $sqlResults['id'];
        $this->createdAt = $sqlResults['created_at'];
     
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of createdAt
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */ 
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}