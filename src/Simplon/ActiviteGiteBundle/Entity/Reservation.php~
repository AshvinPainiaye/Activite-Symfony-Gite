<?php

namespace Simplon\ActiviteGiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="Simplon\ActiviteGiteBundle\Repository\ReservationRepository")
 */
class Reservation
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
     * @ORM\Column(name="date", type="string", length=255)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255)
     */
    private $statut;

    /**
     * @var string
     *
     * @ORM\Column(name="paiement", type="string", length=255)
     */
    private $paiement;

    /**
     * @ORM\OneToOne(targetEntity="Client", inversedBy="reservation",cascade={"persist"})
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="Chambres", inversedBy="reservation",cascade={"persist"})
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
     * Set date
     *
     * @param string $date
     *
     * @return Reservation
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Reservation
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set paiement
     *
     * @param string $paiement
     *
     * @return Reservation
     */
    public function setPaiement($paiement)
    {
        $this->paiement = $paiement;

        return $this;
    }

    /**
     * Get paiement
     *
     * @return string
     */
    public function getPaiement()
    {
        return $this->paiement;
    }

    /**
     * Set client
     *
     * @param \Simplon\ActiviteGiteBundle\Entity\Client $client
     *
     * @return Reservation
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
     * Set chambres
     *
     * @param \Simplon\ActiviteGiteBundle\Entity\Chambres $chambres
     *
     * @return Reservation
     */
    public function setChambres(\Simplon\ActiviteGiteBundle\Entity\Chambres $chambres = null)
    {
        $this->chambres = $chambres;

        return $this;
    }

    /**
     * Get chambres
     *
     * @return \Simplon\ActiviteGiteBundle\Entity\Chambres
     */
    public function getChambres()
    {
        return $this->chambres;
    }
}
