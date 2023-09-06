<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipement
 *
 * @ORM\Table(name="equipement")
 * @ORM\Entity
 */
class Equipement
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="fabricant", type="string", length=30, nullable=false)
     */
    private $fabricant;

    /**
     * @var string
     *
     * @ORM\Column(name="mes", type="string", length=50, nullable=false)
     */
    private $mes;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=150, nullable=true)
     */
    private $etat;

    


    public function getNom(): ?string
    {
        return $this->nom;
    }

    

 public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }






    public function getType(): ?string
    {
        return $this->type;
    }

   
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }



    
    public function getFabricant(): ?string
    {
        return $this->fabricant;
    }

    public function setFabricant(string $fabricant): self
    {
        $this->fabricant = $fabricant;

        return $this;
    }

   
    

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }







}
