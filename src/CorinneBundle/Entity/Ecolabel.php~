<?php

namespace CorinneBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ecolabel
 */
class Ecolabel
{
    //  FONCTION DE METHOD UPLOAD
    public $file;

    public function preUpload()
    {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $this->source = uniqid().'.'.$this->file->guessExtension();
        }
    }

    /**
     * @ORM\postPersist
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
     * @ORM\postRemove
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
        return 'bundles/corinne/img-ecolabel';
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


//  CODE GENERER
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
    private $texte;


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
     * @return Ecolabel
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
     * @return Ecolabel
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
     * Set texte
     *
     * @param string $texte
     * @return Ecolabel
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string 
     */
    public function getTexte()
    {
        return $this->texte;
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
}
