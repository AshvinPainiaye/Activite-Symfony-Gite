<?php

namespace Simplon\ActiviteGiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chambres
 *
 * @ORM\Table(name="chambres")
 * @ORM\Entity(repositoryClass="Simplon\ActiviteGiteBundle\Repository\ChambresRepository")
 */
class Chambres
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
     * @ORM\Column(name="nombrePlace", type="string", length=255)
     */
    private $nombrePlace;

    /**
     * @var string
     *
     * @ORM\Column(name="disponible", type="string", length=255)
     */
    private $disponible;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="string", length=255)
     */
    private $prix;


    /**
     * @ORM\ManyToOne(targetEntity="Gites", inversedBy="chambres",cascade={"persist"})
     */
    private $gites;

    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="chambres",cascade={"persist"})
     */
    private $client;


    /**
     * @ORM\OneToMany(targetEntity="Reservation", mappedBy="chambres",cascade={"persist"})
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
     * Set nombrePlace
     *
     * @param string $nombrePlace
     *
     * @return Chambres
     */
    public function setNombrePlace($nombrePlace)
    {
        $this->nombrePlace = $nombrePlace;

        return $this;
    }

    /**
     * Get nombrePlace
     *
     * @return string
     */
    public function getNombrePlace()
    {
        return $this->nombrePlace;
    }

    /**
     * Set disponible
     *
     * @param string $disponible
     *
     * @return Chambres
     */
    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;

        return $this;
    }

    /**
     * Get disponible
     *
     * @return string
     */
    public function getDisponible()
    {
        return $this->disponible;
    }

    /**
     * Set prix
     *
     * @param string $prix
     *
     * @return Chambres
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set gites
     *
     * @param \Simplon\ActiviteGiteBundle\Entity\Gites $gites
     *
     * @return Chambres
     */
    public function setGites(\Simplon\ActiviteGiteBundle\Entity\Gites $gites = null)
    {
        $this->gites = $gites;

        return $this;
    }

    /**
     * Get gites
     *
     * @return \Simplon\ActiviteGiteBundle\Entity\Gites
     */
    public function getGites()
    {
        return $this->gites;
    }

    /**
     * Set client
     *
     * @param \Simplon\ActiviteGiteBundle\Entity\Client $client
     *
     * @return Chambres
     */
    public function setClient(\Simplon\ActiviteGiteBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Simplon\ActiviteGiteBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set reservation
     *
     * @param \Simplon\ActiviteGiteBundle\Entity\Reservation $reservation
     *
     * @return Chambres
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reservation = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add reservation
     *
     * @param \Simplon\ActiviteGiteBundle\Entity\Reservation $reservation
     *
     * @return Chambres
     */
    public function addReservation(\Simplon\ActiviteGiteBundle\Entity\Reservation $reservation)
    {
        $this->reservation[] = $reservation;

        return $this;
    }

    /**
     * Remove reservation
     *
     * @param \Simplon\ActiviteGiteBundle\Entity\Reservation $reservation
     */
    public function removeReservation(\Simplon\ActiviteGiteBundle\Entity\Reservation $reservation)
    {
        $this->reservation->removeElement($reservation);
    }
}
