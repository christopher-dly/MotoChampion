<?php 

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\VehicleImageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: VehicleImageRepository::class)]
class VehicleImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $id;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $image1;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $image2;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $image3;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $image4;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $image5;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $image6;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $image7;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $image8;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $image9;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $image10;
    
    #[ORM\OneToMany(
        targetEntity: "App\Entity\NewVehicle",
        mappedBy: "vehicleImage",
        cascade: ["persist", "remove"]
    )]
    private ?Collection $newVehicles = null;

    public function __construct()
    {
        $this->newVehicles = new ArrayCollection();  // Correction de la casse
    }
    
    public function getNewVehicles()
    {
        return $this->newVehicles;  // Correction de la casse
    }
    
    public function addNewVehicle(NewVehicle $newVehicle)
    {
        $this->newVehicles[] = $newVehicle;  // Correction de la casse
        $newVehicle->setVehicleImage($this);
    
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
     * Get the value of image1
     */ 
    public function getImage1()
    {
        return $this->image1;
    }

    /**
     * Set the value of image1
     *
     * @return  self
     */ 
    public function setImage1($image1)
    {
        $this->image1 = $image1;

        return $this;
    }

    /**
     * Get the value of image2
     */ 
    public function getImage2()
    {
        return $this->image2;
    }

    /**
     * Set the value of image2
     *
     * @return  self
     */ 
    public function setImage2($image2)
    {
        $this->image2 = $image2;

        return $this;
    }

    /**
     * Get the value of image3
     */ 
    public function getImage3()
    {
        return $this->image3;
    }

    /**
     * Set the value of image3
     *
     * @return  self
     */ 
    public function setImage3($image3)
    {
        $this->image3 = $image3;

        return $this;
    }

    /**
     * Get the value of image4
     */ 
    public function getImage4()
    {
        return $this->image4;
    }

    /**
     * Set the value of image4
     *
     * @return  self
     */ 
    public function setImage4($image4)
    {
        $this->image4 = $image4;

        return $this;
    }

    /**
     * Get the value of image5
     */ 
    public function getImage5()
    {
        return $this->image5;
    }

    /**
     * Set the value of image5
     *
     * @return  self
     */ 
    public function setImage5($image5)
    {
        $this->image5 = $image5;

        return $this;
    }

    /**
     * Get the value of image6
     */ 
    public function getImage6()
    {
        return $this->image6;
    }

    /**
     * Set the value of image6
     *
     * @return  self
     */ 
    public function setImage6($image6)
    {
        $this->image6 = $image6;

        return $this;
    }

    /**
     * Get the value of image7
     */ 
    public function getImage7()
    {
        return $this->image7;
    }

    /**
     * Set the value of image7
     *
     * @return  self
     */ 
    public function setImage7($image7)
    {
        $this->image7 = $image7;

        return $this;
    }

    /**
     * Get the value of image8
     */ 
    public function getImage8()
    {
        return $this->image8;
    }

    /**
     * Set the value of image8
     *
     * @return  self
     */ 
    public function setImage8($image8)
    {
        $this->image8 = $image8;

        return $this;
    }

    /**
     * Get the value of image9
     */ 
    public function getImage9()
    {
        return $this->image9;
    }

    /**
     * Set the value of image9
     *
     * @return  self
     */ 
    public function setImage9($image9)
    {
        $this->image9 = $image9;

        return $this;
    }

    /**
     * Get the value of image10
     */ 
    public function getImage10()
    {
        return $this->image10;
    }

    /**
     * Set the value of image10
     *
     * @return  self
     */ 
    public function setImage10($image10)
    {
        $this->image10 = $image10;

        return $this;
    }
}