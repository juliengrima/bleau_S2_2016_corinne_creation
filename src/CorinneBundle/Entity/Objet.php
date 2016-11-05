<?php

namespace CorinneBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * Objet
 */
class Objet
{
    public function __toString()
    {
        return strval($this->id);
    }
    //  FONCTION DE METHOD UPLOAD

//  GENERATED CODE


    /**
     * @var integer
     */
    private $id;


    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     * @Assert\File(
     *     maxSize
     *      = "2048k",
     *     mimeTypes={ "image/jpeg", "image/jpg", "image/png" })
     */
    private $source;

    /**
     * @var string
     */
    private $alt;

    /**
     * @var string
     */
    private $definition;

    /**
     * @var boolean
     */
    private $slider;

    /**
     * @var \CorinneBundle\Entity\Categorie
     */
    private $categ;

    /**
     * @var \CorinneBundle\Entity\SousCategorie
     */
    private $sousCateg;



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
     * Set source
     *
     * @param string $source
     * @return Objet
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string 
     */
    public function getSource()
    {
        return $this->source;
    }

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

    /**
     * Set definition
     *
     * @param string $definition
     * @return Objet
     */
    public function setDefinition($definition)
    {
        $this->definition = $definition;

        return $this;
    }

    /**
     * Get definition
     *
     * @return string 
     */
    public function getDefinition()
    {
        return $this->definition;
    }

    /**
     * Set slider
     *
     * @param boolean $slider
     * @return Objet
     */
    public function setSlider($slider)
    {
        $this->slider = $slider;

        return $this;
    }

    /**
     * Get slider
     *
     * @return boolean 
     */
    public function getSlider()
    {
        return $this->slider;
    }

    /**
     * Set categ
     *
     * @param \CorinneBundle\Entity\Categorie $categ
     * @return Objet
     */
    public function setCateg(\CorinneBundle\Entity\Categorie $categ = null)
    {
        $this->categ = $categ;

        return $this;
    }

    /**
     * Get categ
     *
     * @return \CorinneBundle\Entity\Categorie
     */
    public function getCateg()
    {
        return  $this->categ ;
    }


    /**
     * Set sousCateg
     *
     * @param \CorinneBundle\Entity\SousCategorie $sousCateg
     * @return Objet
     */
    public function setSousCateg(\CorinneBundle\Entity\SousCategorie $sousCateg = null)
    {
        $this->sousCateg = $sousCateg;

        return $this;
    }

    /**
     * Get sousCateg
     *
     * @return \CorinneBundle\Entity\SousCategorie 
     */
    public function getSousCateg()
    {
        return  $this->sousCateg;
    }




}
