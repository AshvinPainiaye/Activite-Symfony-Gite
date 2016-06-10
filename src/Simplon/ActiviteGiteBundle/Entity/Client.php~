<?php

namespace Simplon\ActiviteGiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="Simplon\ActiviteGiteBundle\Repository\ClientRepository")
 */
class Client
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
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

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
     * @ORM\OneToMany(targetEntity="Chambres", mappedBy="client",cascade={"persist"})
     */
    private $chambres;

    /**
     * @ORM\OneToOne(targetEntity="Reservation", mappedBy="client",cascade={"persist"})
     */
    private $reservation;


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
     * @return Client
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
     *
     * @return Client
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
     * Set tel
     *
     * @param string $tel
     *
     * @return Client
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
     * @return Client
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
     * Constructor
     */
    public function __construct()
    {
        $this->chambres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add chambre
     *
     * @param \Simplon\ActiviteGiteBundle\Entity\chambres $chambre
     *
     * @return Client
     */
    public function addChambre(\Simplon\ActiviteGiteBundle\Entity\chambres $chambre)
    {
        $this->chambres[] = $chambre;

        return $this;
    }

    /**
     * Remove chambre
     *
     * @param \Simplon\ActiviteGiteBundle\Entity\chambres $chambre
     */
    public function removeChambre(\Simplon\ActiviteGiteBundle\Entity\chambres $chambre)
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

    /**
     * Set reservation
     *
     * @param \Simplon\ActiviteGiteBundle\Entity\Reservation $reservation
     *
     * @return Client
     */
    public function setReservation(\Simplon\ActiviteGiteBundle\Entity\Reservation $reservation = null)
    {
        $this->reservation = $reservation;

        return $this;
    }

    /**
     * Get reservation
     *
     * @return \Simplon\ActiviteGiteBundle\Entity\Reservation
     */
    public function getReservation()
    {
        return $this->reservation;
    }
}
