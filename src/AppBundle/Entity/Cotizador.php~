<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Cotizador
 *
 * @ORM\Table(name="cotizador")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CotizadorRepository")
 */
class Cotizador
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @JMS\Groups({"cotizador_index", "business_single","comment_index"})
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="precio", type="float")
     * @JMS\Groups({"cotizador_index", "business_single","comment_index"})
     */
    private $precio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     * @JMS\Groups({"cotizador_index", "business_single","comment_index"})

     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateAt", type="datetime")
     * @JMS\Groups({"cotizador_index", "business_single","comment_index"})

     */
    private $updateAt;


    /**
     * @var string
     *
     * @ORM\Column(name="producto", type="string", length=255)
     * @JMS\Groups({"cotizador_index", "producto_sinble","comment_index"})

     */
    private $producto;



    /**
     * @ORM\ManyToOne(targetEntity="Marca", inversedBy="cotizador")
     * @ORM\JoinColumn(name="marca_id", referencedColumnName="id")
     * @JMS\Groups({"cotizador_index", "marca_single","comment_index"})

     */
    private $marca;

//    /**
//     * @ORM\ManyToOne(targetEntity="Vehiculo", inversedBy="cotizador")
//     * @ORM\JoinColumn(name="vehiculo_id", referencedColumnName="id")
//     */
//    private $vehiculo;

    /**
     * @ORM\ManyToOne(targetEntity="Modelo", inversedBy="cotizador")
     * @ORM\JoinColumn(name="modelo_id", referencedColumnName="id")
     * @JMS\Groups({"cotizador_index", "business_single","comment_index"})

     */
    private $modelo;

    /**
     * @ORM\ManyToOne(targetEntity="Categoria", inversedBy="cotizador")
     * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     * @JMS\Groups({"cotizador_index", "business_single","comment_index"})
     */
    private $categoria;













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
     * Set precio
     *
     * @param float $precio
     *
     * @return Cotizador
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Cotizador
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     *
     * @return Cotizador
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    /**
     * Set marca
     *
     * @param \AppBundle\Entity\Marca $marca
     *
     * @return Cotizador
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
     * Set vehiculo
     *
     * @param \AppBundle\Entity\Vehiculo $vehiculo
     *
     * @return Cotizador
     */
    public function setVehiculo(\AppBundle\Entity\Vehiculo $vehiculo = null)
    {
        $this->vehiculo = $vehiculo;

        return $this;
    }

    /**
     * Get vehiculo
     *
     * @return \AppBundle\Entity\Vehiculo
     */
    public function getVehiculo()
    {
        return $this->vehiculo;
    }

    /**
     * Set modelo
     *
     * @param \AppBundle\Entity\Modelo $modelo
     *
     * @return Cotizador
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

    /**
     * Set categoria
     *
     * @param \AppBundle\Entity\Categoria $categoria
     *
     * @return Cotizador
     */
    public function setCategoria(\AppBundle\Entity\Categoria $categoria = null)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return \AppBundle\Entity\Categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }



    /**
     * Set producto
     *
     * @param string $producto
     *
     * @return Cotizador
     */
    public function setProducto($producto)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return string
     */
    public function getProducto()
    {
        return $this->producto;
    }
}
