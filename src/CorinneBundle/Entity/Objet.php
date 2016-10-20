<?php

namespace CorinneBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Objet
 */
class Objet
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
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
     * @var bool
     */
    private $slider;


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
     * @var \CorinneBundle\Entity\SousCategorie
     */
    private $product;


    /**
     * Set product
     *
     * @param \CorinneBundle\Entity\SousCategorie $product
     * @return Objet
     */
    public function setProduct(\CorinneBundle\Entity\SousCategorie $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \CorinneBundle\Entity\SousCategorie 
     */
    public function getProduct()
    {
        return $this->product;
    }
}
