<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstadoVentaAsistida
 *
 * @ORM\Table(name="estado_venta_asistida", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class EstadoVentaAsistida
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
     * @ORM\Column(name="nombre_estado_venta_asistida", type="string", length=25, nullable=false)
     */
    private $nombreEstadoVentaAsistida;



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
     * Set nombreEstadoVentaAsistida
     *
     * @param string $nombreEstadoVentaAsistida
     * @return EstadoVentaAsistida
     */
    public function setNombreEstadoVentaAsistida($nombreEstadoVentaAsistida)
    {
        $this->nombreEstadoVentaAsistida = $nombreEstadoVentaAsistida;

        return $this;
    }

    /**
     * Get nombreEstadoVentaAsistida
     *
     * @return string 
     */
    public function getNombreEstadoVentaAsistida()
    {
        return $this->nombreEstadoVentaAsistida;
    }
}
