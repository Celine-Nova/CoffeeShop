<?php

class CoreModel {
    
    protected $id;
    protected $createdAt;
    protected $updatedAt; 

    public function __construct($sqlResults)
    {
        $this->id = $sqlResults['id'];
        $this->createdAt = $sqlResults['created_at'];
     
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    
}
