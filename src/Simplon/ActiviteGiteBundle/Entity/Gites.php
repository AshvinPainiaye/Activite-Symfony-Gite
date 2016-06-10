<?php

namespace Simplon\ActiviteGiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gites
 *
 * @ORM\Table(name="gites")
 * @ORM\Entity(repositoryClass="Simplon\ActiviteGiteBundle\Repository\GitesRepository")
 */
class Gites
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToOne(targetEntity="Gestionnaire", mappedBy="gites",cascade={"persist"})
     */
    private $gestionnaire;

    /**
     * @ORM\OneToMany(targetEntity="Chambres", mappedBy="gites",cascade={"persist"})
     */
    private $chambres;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Gites
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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Gites
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Gites
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

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Gites
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set gestionnaire
     *
     * @param \Simplon\ActiviteGiteBundle\Entity\Gestionnaire $gestionnaire
     *
     * @return Gites
     */
    public function setGestionnaire(\Simplon\ActiviteGiteBundle\Entity\Gestionnaire $gestionnaire = null)
    {
        $this->gestionnaire = $gestionnaire;

        return $this;
    }

    /**
     * Get gestionnaire
     *
     * @return \Simplon\ActiviteGiteBundle\Entity\Gestionnaire
     */
    public function getGestionnaire()
    {
        return $this->gestionnaire;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->chambres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add chambre
     *
     * @param \Simplon\ActiviteGiteBundle\Entity\Chambres $chambre
     *
     * @return Gites
     */
    public function addChambre(\Simplon\ActiviteGiteBundle\Entity\Chambres $chambre)
    {
        $this->chambres[] = $chambre;

        return $this;
    }

    /**
     * Remove chambre
     *
     * @param \Simplon\ActiviteGiteBundle\Entity\Chambres $chambre
     */
    public function removeChambre(\Simplon\ActiviteGiteBundle\Entity\Chambres $chambre)
    {
        $this->chambres->removeElement($chambre);
    }

    /**
     * Get chambres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChambres()
    {
        return $this->chambres;
    }
}
