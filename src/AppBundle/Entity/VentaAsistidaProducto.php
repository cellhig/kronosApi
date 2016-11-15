<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VentaAsistidaProducto
 *
 * @ORM\Table(name="venta_asistida_producto", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_venta_asistida_producto_catalogo_venta_asistida1_idx", columns={"venta_asistida_id"}), @ORM\Index(name="fk_venta_asistida_producto_catalogo_producto1_idx", columns={"producto_id"})})
 * @ORM\Entity
 */
class VentaAsistidaProducto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", length=140, nullable=true)
     */
    private $observaciones;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_producto", type="integer", nullable=false)
     */
    private $cantidadProducto;

    /**
     * @var \AppBundle\Entity\Producto
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Producto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="producto_id", referencedColumnName="id")
     * })
     */
    private $producto;

    /**
     * @var \AppBundle\Entity\VentaAsistida
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\VentaAsistida")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="venta_asistida_id", referencedColumnName="id")
     * })
     */
    private $ventaAsistida;



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
     * Set observaciones
     *
     * @param string $observaciones
     * @return VentaAsistidaProducto
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set cantidadProducto
     *
     * @param integer $cantidadProducto
     * @return VentaAsistidaProducto
     */
    public function setCantidadProducto($cantidadProducto)
    {
        $this->cantidadProducto = $cantidadProducto;

        return $this;
    }

    /**
     * Get cantidadProducto
     *
     * @return integer 
     */
    public function getCantidadProducto()
    {
        return $this->cantidadProducto;
    }

    /**
     * Set producto
     *
     * @param \AppBundle\Entity\Producto $producto
     * @return VentaAsistidaProducto
     */
    public function setProducto(\AppBundle\Entity\Producto $producto = null)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return \AppBundle\Entity\Producto 
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set ventaAsistida
     *
     * @param \AppBundle\Entity\VentaAsistida $ventaAsistida
     * @return VentaAsistidaProducto
     */
    public function setVentaAsistida(\AppBundle\Entity\VentaAsistida $ventaAsistida = null)
    {
        $this->ventaAsistida = $ventaAsistida;

        return $this;
    }

    /**
     * Get ventaAsistida
     *
     * @return \AppBundle\Entity\VentaAsistida 
     */
    public function getVentaAsistida()
    {
        return $this->ventaAsistida;
    }
}
