<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type:'text', length:100)]
    private ?string $username = null;

    #[ORM\Column(type:'text', length:100)]
    private ?string $password = null;

    #[ORM\Column(type:'text', length:100)]
    private ?string $email = null;

    #[ORM\OneToMany(
        targetEntity: "App\Entity\Actuality",
        mappedBy: "user",
        cascade: ["persist"]
    )]
    private ?array $actualities = null;

    #[ORM\OneToMany(
        targetEntity: "App\Entity\Message",
        mappedBy: "user",
        cascade: ["persist", "remove"]
    )]
    private ?array $messages = null;

    public function __construct()
    {
        $this->actualities = new ArrayCollection();
        $this->messages = new ArrayCollection();
    }

    /**
     * Get the value of actualities
     */ 
    public function getActualities()
    {
        return $this->actualities;
    }
    
    /**
     * Add actuality
     *
     * @return self
     */ 
    public function addActuality(Actuality $actuality)
    {
        $this->actualities[] = $actuality;
        $actuality->setUser($this);

        return $this;
    }

     /**
     * Get the value of messages
     */ 
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * add message
     * 
     * @return self
     */
    public function addMessage(Message $message)
    {
        $this->messages[] = $message;
        $message->setUser($this);

        return $this;
    }
    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

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
}