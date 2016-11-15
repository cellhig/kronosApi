<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductoCatalogo
 *
 * @ORM\Table(name="producto_catalogo", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_producto_catalogo_producto1_idx", columns={"producto_id"}), @ORM\Index(name="fk_producto_catalogo_catalogo1_idx", columns={"catalogo_id"})})
 * @ORM\Entity
 */
class ProductoCatalogo
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
     * @var \AppBundle\Entity\Catalogo
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Catalogo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="catalogo_id", referencedColumnName="id")
     * })
     */
    private $catalogo;

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
     * Set catalogo
     *
     * @param \AppBundle\Entity\Catalogo $catalogo
     * @return ProductoCatalogo
     */
    public function setCatalogo(\AppBundle\Entity\Catalogo $catalogo = null)
    {
        $this->catalogo = $catalogo;

        return $this;
    }

    /**
     * Get catalogo
     *
     * @return \AppBundle\Entity\Catalogo 
     */
    public function getCatalogo()
    {
        return $this->catalogo;
    }

    /**
     * Set producto
     *
     * @param \AppBundle\Entity\Producto $producto
     * @return ProductoCatalogo
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
