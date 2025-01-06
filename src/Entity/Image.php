<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ImageRepository;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column]
    private ?string $color1 = null;

    #[ORM\Column]
    private ?string $color2 = null;
    
    #[ORM\Column]
    private ?string $color3 = null;

    #[ORM\Column]
    private ?string $color4 = null;

    #[ORM\Column]
    private ?string $color5 = null;

    #[ORM\Column]
    private ?string $colorAction = null;

    #[ORM\Column]
    private ?string $ImgColor1 = null;

    #[ORM\Column]
    private ?string $ImgColor2 = null;

    #[ORM\Column]
    private ?string $ImgColor3 = null;

    #[ORM\Column]
    private ?string $ImgColor4 = null;

    #[ORM\Column]
    private ?string $ImgColor5 = null;

    #[ORM\Column]
    private ?string $ImgAction = null;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of color1
     */ 
    public function getColor1()
    {
        return $this->color1;
    }

    /**
     * Set the value of color1
     *
     * @return  self
     */ 
    public function setColor1($color1)
    {
        $this->color1 = $color1;

        return $this;
    }

    /**
     * Get the value of color2
     */ 
    public function getColor2()
    {
        return $this->color2;
    }

    /**
     * Set the value of color2
     *
     * @return  self
     */ 
    public function setColor2($color2)
    {
        $this->color2 = $color2;

        return $this;
    }

    /**
     * Get the value of color3
     */ 
    public function getColor3()
    {
        return $this->color3;
    }

    /**
     * Set the value of color3
     *
     * @return  self
     */ 
    public function setColor3($color3)
    {
        $this->color3 = $color3;

        return $this;
    }

    /**
     * Get the value of color4
     */ 
    public function getColor4()
    {
        return $this->color4;
    }

    /**
     * Set the value of color4
     *
     * @return  self
     */ 
    public function setColor4($color4)
    {
        $this->color4 = $color4;

        return $this;
    }

    /**
     * Get the value of color5
     */ 
    public function getColor5()
    {
        return $this->color5;
    }

    /**
     * Set the value of color5
     *
     * @return  self
     */ 
    public function setColor5($color5)
    {
        $this->color5 = $color5;

        return $this;
    }

    /**
     * Get the value of ImgColor1
     */ 
    public function getImgColor1()
    {
        return $this->ImgColor1;
    }

    /**
     * Set the value of ImgColor1
     *
     * @return  self
     */ 
    public function setImgColor1($ImgColor1)
    {
        $this->ImgColor1 = $ImgColor1;

        return $this;
    }

    /**
     * Get the value of ImgColor2
     */ 
    public function getImgColor2()
    {
        return $this->ImgColor2;
    }

    /**
     * Set the value of ImgColor2
     *
     * @return  self
     */ 
    public function setImgColor2($ImgColor2)
    {
        $this->ImgColor2 = $ImgColor2;

        return $this;
    }

    /**
     * Get the value of colorAction
     */ 
    public function getColorAction()
    {
        return $this->colorAction;
    }

    /**
     * Set the value of colorAction
     *
     * @return  self
     */ 
    public function setColorAction($colorAction)
    {
        $this->colorAction = $colorAction;

        return $this;
    }

    /**
     * Get the value of ImgColor3
     */ 
    public function getImgColor3()
    {
        return $this->ImgColor3;
    }

    /**
     * Set the value of ImgColor3
     *
     * @return  self
     */ 
    public function setImgColor3($ImgColor3)
    {
        $this->ImgColor3 = $ImgColor3;

        return $this;
    }

    /**
     * Get the value of ImgColor4
     */ 
    public function getImgColor4()
    {
        return $this->ImgColor4;
    }

    /**
     * Set the value of ImgColor4
     *
     * @return  self
     */ 
    public function setImgColor4($ImgColor4)
    {
        $this->ImgColor4 = $ImgColor4;

        return $this;
    }

    /**
     * Get the value of ImgColor5
     */ 
    public function getImgColor5()
    {
        return $this->ImgColor5;
    }

    /**
     * Set the value of ImgColor5
     *
     * @return  self
     */ 
    public function setImgColor5($ImgColor5)
    {
        $this->ImgColor5 = $ImgColor5;

        return $this;
    }

    /**
     * Get the value of ImgAction
     */ 
    public function getImgAction()
    {
        return $this->ImgAction;
    }

    /**
     * Set the value of ImgAction
     *
     * @return  self
     */ 
    public function setImgAction($ImgAction)
    {
        $this->ImgAction = $ImgAction;

        return $this;
    }
}


