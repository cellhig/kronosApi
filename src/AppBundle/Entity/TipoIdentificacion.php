<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoIdentificacion
 *
 * @ORM\Table(name="tipo_identificacion", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class TipoIdentificacion
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
     * @ORM\Column(name="nombre_tipo_identificacion", type="string", length=30, nullable=false)
     */
    private $nombreTipoIdentificacion;



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
     * Set nombreTipoIdentificacion
     *
     * @param string $nombreTipoIdentificacion
     * @return TipoIdentificacion
     */
    public function setNombreTipoIdentificacion($nombreTipoIdentificacion)
    {
        $this->nombreTipoIdentificacion = $nombreTipoIdentificacion;

        return $this;
    }

    /**
     * Get nombreTipoIdentificacion
     *
     * @return string 
     */
    public function getNombreTipoIdentificacion()
    {
        return $this->nombreTipoIdentificacion;
    }
}
