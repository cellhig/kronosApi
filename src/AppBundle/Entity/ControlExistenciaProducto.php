<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ControlExistenciaProducto
 *
 * @ORM\Table(name="control_existencia_producto", indexes={@ORM\Index(name="fk_control_existencia_producto_producto1_idx", columns={"producto_id"}), @ORM\Index(name="fk_control_existencia_producto_control_existencia1_idx", columns={"control_existencia_id"})})
 * @ORM\Entity
 */
class ControlExistenciaProducto
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
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=false)
     */
    private $cantidad;

    /**
     * @var \AppBundle\Entity\ControlExistencia
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ControlExistencia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="control_existencia_id", referencedColumnName="id")
     * })
     */
    private $controlExistencia;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return ControlExistenciaProducto
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set controlExistencia
     *
     * @param \AppBundle\Entity\ControlExistencia $controlExistencia
     * @return ControlExistenciaProducto
     */
    public function setControlExistencia(\AppBundle\Entity\ControlExistencia $controlExistencia = null)
    {
        $this->controlExistencia = $controlExistencia;

        return $this;
    }

    /**
     * Get controlExistencia
     *
     * @return \AppBundle\Entity\ControlExistencia 
     */
    public function getControlExistencia()
    {
        return $this->controlExistencia;
    }

    /**
     * Set producto
     *
     * @param \AppBundle\Entity\Producto $producto
     * @return ControlExistenciaProducto
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
}
