<?php

namespace CorinneBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SousCategorie
 */
class SousCategorie
{


    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->nomsouscat;
    }

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nomsouscat;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $objet;

    /**
     * @var \CorinneBundle\Entity\Categorie
     */
    private $categorie;

    /**
     * Constructor
     */
    public function __construct()
    {
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
     * Set nomsouscat
     *
     * @param string $nomsouscat
     * @return SousCategorie
     */
    public function setNomsouscat($nomsouscat)
    {
        $this->nomsouscat = $nomsouscat;

        return $this;
    }

    /**
     * Get nomsouscat
     *
     * @return string 
     */
    public function getNomsouscat()
    {
        return $this->nomsouscat;
    }

    /**
     * Add objet
     *
     * @param \CorinneBundle\Entity\Objet $objet
     * @return SousCategorie
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

    /**
     * Set categorie
     *
     * @param \CorinneBundle\Entity\Categorie $categorie
     * @return SousCategorie
     */
    public function setCategorie(\CorinneBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \CorinneBundle\Entity\Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}
