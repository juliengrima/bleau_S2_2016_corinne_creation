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
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $souscategorie;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->souscategorie = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add souscategorie
     *
     * @param \CorinneBundle\Entity\SousCategorie $souscategorie
     * @return Categorie
     */
    public function addSouscategorie(\CorinneBundle\Entity\SousCategorie $souscategorie)
    {
        $this->souscategorie[] = $souscategorie;

        return $this;
    }

    /**
     * Remove souscategorie
     *
     * @param \CorinneBundle\Entity\SousCategorie $souscategorie
     */
    public function removeSouscategorie(\CorinneBundle\Entity\SousCategorie $souscategorie)
    {
        $this->souscategorie->removeElement($souscategorie);
    }

    /**
     * Get souscategorie
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSouscategorie()
    {
        return $this->souscategorie;
    }
}
