<?php

namespace CorinneBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 */
class Categorie
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nomcat;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomcat
     *
     * @param string $nomcat
     * @return Categorie
     */
    public function setNomcat($nomcat)
    {
        $this->nomcat = $nomcat;

        return $this;
    }

    /**
     * Get nomcat
     *
     * @return string 
     */
    public function getNomcat()
    {
        return $this->nomcat;
    }
}
