<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Modelo
 *
 * @ORM\Table(name="modelo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ModeloRepository")
 */
class Modelo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @JMS\Groups({"cotizador_index", "modelo_single","modelo_index"})

     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Modelo", type="string", length=255)
     * @JMS\Groups({"cotizador_index", "modelo_single","modelo_index"})

     */
    private $modelo;
    /**
     * @ORM\ManyToOne(targetEntity="Marca", inversedBy="modelo")
     * @ORM\JoinColumn(name="marca_id", referencedColumnName="id")
     */
    private $marca;

    /**
     * @ORM\OneToMany(targetEntity="Cotizador", mappedBy="modelo")
     */
    private $cotizador;

    /**
     * @ORM\OneToMany(targetEntity="Categoria", mappedBy="modelo")
     */
    private $categoria;

    public function __construct()
    {
        $this->cotizador = new ArrayCollection();
        $this->categoria = new ArrayCollection();

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
     * Set modelo
     *
     * @param string $modelo
     *
     * @return Modelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Add cotizador
     *
     * @param \AppBundle\Entity\Cotizador $cotizador
     *
     * @return Modelo
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
        return (string) $this->modelo;
    }

    /**
     * Set marca
     *
     * @param \AppBundle\Entity\Marca $marca
     *
     * @return Modelo
     */
    public function setMarca(\AppBundle\Entity\Marca $marca = null)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return \AppBundle\Entity\Marca
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Add categorium
     *
     * @param \AppBundle\Entity\Categoria $categorium
     *
     * @return Modelo
     */
    public function addCategorium(\AppBundle\Entity\Categoria $categorium)
    {
        $this->categoria[] = $categorium;

        return $this;
    }

    /**
     * Remove categorium
     *
     * @param \AppBundle\Entity\Categoria $categorium
     */
    public function removeCategorium(\AppBundle\Entity\Categoria $categorium)
    {
        $this->categoria->removeElement($categorium);
    }

    /**
     * Get categoria
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategoria()
    {
        return $this->categoria;
    }
}
