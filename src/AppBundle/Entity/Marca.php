<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Marca
 *
 * @ORM\Table(name="marca")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MarcaRepository")
 */
class Marca
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @JMS\Groups({"marca_index", "marca_single","comment_index","cotizador_index"})

     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=255)
     * @JMS\Groups({"marca_index", "marca_single","comment_index","cotizador_index"})

     */
    private $marca;

    /**
     * @ORM\OneToMany(targetEntity="Cotizador", mappedBy="marca")
     */
    private $cotizador;
    /**
     * @ORM\OneToMany(targetEntity="Modelo", mappedBy="marca")
     */
    private $modelo;


    public function __construct()
    {
        $this->cotizador = new ArrayCollection();
        $this->modelo = new ArrayCollection();
    }
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
     * Set marca
     *
     * @param string $marca
     *
     * @return Marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }



    /**
     * Add cotizador
     *
     * @param \AppBundle\Entity\Cotizador $cotizador
     *
     * @return Marca
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
        return (string) $this->marca;
    }

    /**
     * Add modelo
     *
     * @param \AppBundle\Entity\Modelo $modelo
     *
     * @return Marca
     */
    public function addModelo(\AppBundle\Entity\Modelo $modelo)
    {
        $this->modelo[] = $modelo;

        return $this;
    }

    /**
     * Remove modelo
     *
     * @param \AppBundle\Entity\Modelo $modelo
     */
    public function removeModelo(\AppBundle\Entity\Modelo $modelo)
    {
        $this->modelo->removeElement($modelo);
    }

    /**
     * Get modelo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModelo()
    {
        return $this->modelo;
    }
}
