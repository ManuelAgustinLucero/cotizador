<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Categoria
 *
 * @ORM\Table(name="categoria")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoriaRepository")
 */
class Categoria
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @JMS\Groups({"cotizador_index", "categoria_single","categoria_index"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="categoria", type="string", length=255)
     * @JMS\Groups({"cotizador_index", "categoria_single","categoria_index"})
     */
    private $categoria;

    /**
     * @ORM\OneToMany(targetEntity="Cotizador", mappedBy="categoria")
     */
    private $cotizador;

    /**
     * @ORM\ManyToOne(targetEntity="Modelo", inversedBy="categoria")
     * @ORM\JoinColumn(name="modelo_id", referencedColumnName="id")
     */
    private $modelo;

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
     * Set categoria
     *
     * @param string $categoria
     *
     * @return Categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return string
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Add cotizador
     *
     * @param \AppBundle\Entity\Cotizador $cotizador
     *
     * @return Categoria
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
        return (string) $this->categoria;
    }

    /**
     * Set modelo
     *
     * @param \AppBundle\Entity\Modelo $modelo
     *
     * @return Categoria
     */
    public function setModelo(\AppBundle\Entity\Modelo $modelo = null)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return \AppBundle\Entity\Modelo
     */
    public function getModelo()
    {
        return $this->modelo;
    }
}
