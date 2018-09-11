<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Vehiculo
 *
 * @ORM\Table(name="vehiculo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VehiculoRepository")
 */
class Vehiculo
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
     * @ORM\Column(name="vehiculo", type="string", length=255)
     */
    private $vehiculo;




    /**
     * @ORM\OneToMany(targetEntity="Cotizador", mappedBy="vehiculo")
     */
    private $cotizador;


    public function __construct()
    {
        $this->cotizador = new ArrayCollection();
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
     * Set vehiculo
     *
     * @param string $vehiculo
     *
     * @return Vehiculo
     */
    public function setVehiculo($vehiculo)
    {
        $this->vehiculo = $vehiculo;

        return $this;
    }

    /**
     * Get vehiculo
     *
     * @return string
     */
    public function getVehiculo()
    {
        return $this->vehiculo;
    }

    /**
     * Add cotizador
     *
     * @param \AppBundle\Entity\Cotizador $cotizador
     *
     * @return Vehiculo
     */
    public function addCotizador(\AppBundle\Entity\Cotizador $cotizador)
    {
        $this->cotizador[] = $cotizador;

        return $this;
    }

    /**
     * Remove cotizador
     *
     * @param \AppBundle\Entity\Cotizador $cotizador
     */
    public function removeCotizador(\AppBundle\Entity\Cotizador $cotizador)
    {
        $this->cotizador->removeElement($cotizador);
    }

    /**
     * Get cotizador
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCotizador()
    {
        return $this->cotizador;
    }
    public function __toString(){
        return (string) $this->vehiculo;
    }
}
