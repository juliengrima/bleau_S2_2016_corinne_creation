<?php

namespace CorinneBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 */
class Contact
{

    public function  __toString ()
    {
        // TODO: Implement __toString() method.
        return $this->nom;

    }

    /**
     * @var int
     */
    private $isSave;
    public function setIsSave(int $isSave) {
            $this->isSave = $isSave;
    }

    /**
     * @return int
     */
    public function getIsSave()
    {
        return $this->isSave;
    }

    /**
     * @var string
     */
    private $texte;

    /**
     * @param string $texte
     */
    public function setTexte(string $texte)
    {
        $this->texte = $texte;
    }

    /**
     * @return string
     */
    public function getTexte()
    {
        return $this->texte;
    }

//    GENERATED CODE


    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $tel;


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
     * Set nom
     *
     * @param string $nom
     * @return Contact
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Contact
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return Contact
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Contact
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }
}
