<?php

namespace CorinneBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
    public $file;

    /**
     * @ORM\PrePersist
     */
    public function preUpload()
    {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $this->source = uniqid().'.'.$this->file->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist
     */
    public function upload()
    {
        if (null === $this->file) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file->move($this->getUploadRootDir(), $this->source);

        unset($this->file);
    }

    /**
     * @ORM\PostRemove
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

    //  FONCTION DE TEST DU DOSSIER UPLOAD
    protected function getUploadDir()
    {
        return 'uploads';
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    public function getWebPath()
    {
        return null === $this->source ? null : $this->getUploadDir().'/'.$this->source;
    }

    public function getAbsolutePath()
    {
        return null === $this->source ? null : $this->getUploadRootDir().'/'.$this->source;
    }


    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        // Add your code here
    }

    /**
     * @ORM\PrePersist
     */
    public function setExpiresAtValue()
    {
        // Add your code here
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        // Add your code here
    }



//    CODE GENERE


    /**
     * @var integer
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
