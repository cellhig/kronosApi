<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoriaProducto
 *
 * @ORM\Table(name="categoria_producto", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class CategoriaProducto
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
     * @ORM\Column(name="codigo_categoria", type="string", length=15, nullable=false)
     */
    private $codigoCategoria;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_categoria", type="string", length=25, nullable=true)
     */
    private $nombreCategoria;



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
     * Set codigoCategoria
     *
     * @param string $codigoCategoria
     * @return CategoriaProducto
     */
    public function setCodigoCategoria($codigoCategoria)
    {
        $this->codigoCategoria = $codigoCategoria;

        return $this;
    }

    /**
     * Get codigoCategoria
     *
     * @return string 
     */
    public function getCodigoCategoria()
    {
        return $this->codigoCategoria;
    }

    /**
     * Set nombreCategoria
     *
     * @param string $nombreCategoria
     * @return CategoriaProducto
     */
    public function setNombreCategoria($nombreCategoria)
    {
        $this->nombreCategoria = $nombreCategoria;

        return $this;
    }

    /**
     * Get nombreCategoria
     *
     * @return string 
     */
    public function getNombreCategoria()
    {
        return $this->nombreCategoria;
    }
}
