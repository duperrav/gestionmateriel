<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Incident
 *
 * @ORM\Table(name="incident")
 * @ORM\Entity
 */
class Incident
{
    /**
     * @var string
     *
     * @ORM\Column(name="sujet", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sujet;

    

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;




    public function getSujet(): ?string
    {
        return $this->sujet;
    }

    

 public function setSujet(string $sujet): self
    {
        $this->sujet = $sujet;

        return $this;
    }



 public function getDescription(): ?string
    {
        return $this->description;
    }

    

  public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

}
