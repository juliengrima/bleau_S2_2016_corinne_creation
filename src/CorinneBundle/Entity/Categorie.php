<?php

namespace CorinneBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Categorie
 */
class Categorie
{

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->nomcat;
    }


    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     * @Assert\File(
     *     maxSize = "600k",
     *     mimeTypes={ "image/*" })
     */
    private $source;

    public function getSource()
    {
        return $this->source;
    }

    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @var string
     */
    private $alt;
    /**
     * Set alt
     *
     * @param string $alt
     * @return Objet
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    // YAM GENERATED CODE
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nomcat;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $souscategorie;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $objet;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->souscategorie = new \Doctrine\Common\Collections\ArrayCollection();
        $this->objet = new \Doctrine\Common\Collections\ArrayCollection();
    }

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

    /**
     * Add objet
     *
     * @param \CorinneBundle\Entity\Objet $objet
     * @return Categorie
     */
    public function addObjet(\CorinneBundle\Entity\Objet $objet)
    {
        $this->objet[] = $objet;

        return $this;
    }

    /**
     * Remove objet
     *
     * @param \CorinneBundle\Entity\Objet $objet
     */
    public function removeObjet(\CorinneBundle\Entity\Objet $objet)
    {
        $this->objet->removeElement($objet);
    }

    /**
     * Get objet
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getObjet()
    {
        return $this->objet;
    }

}
