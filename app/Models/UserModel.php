<?php
namespace myFramework\Models;

use myFramework\Models\CoreModel;
use myFramework\Utils\DBData;
// use 
class UserModel {
   private $id;
   private $firstName;
   private $name;
   private $password;
   private $email;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of firstName
     */ 
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */ 
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
   public static function getUsers(){
        $sql = "SELECT * FROM users";
        $result = DBData::getPDO()->query($sql);
        $result->setFetchMode(\PDO::FETCH_CLASS, self::class);
        $users = $result->fetchAll();
        // dump($users);
        return $users;
    }
}