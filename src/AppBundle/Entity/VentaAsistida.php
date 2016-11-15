<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VentaAsistida
 *
 * @ORM\Table(name="venta_asistida", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_venta_asistida_estado_venta_asistida1_idx", columns={"estado_venta_asistida_id"}), @ORM\Index(name="fk_venta_asistida_cliente1_idx", columns={"cliente_id"})})
 * @ORM\Entity
 */
class VentaAsistida
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_solicitud", type="date", nullable=false)
     */
    private $fechaSolicitud;

    /**
     * @var \AppBundle\Entity\Cliente
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     * })
     */
    private $cliente;

    /**
     * @var \AppBundle\Entity\EstadoVentaAsistida
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\EstadoVentaAsistida")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estado_venta_asistida_id", referencedColumnName="id")
     * })
     */
    private $estadoVentaAsistida;



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
     * Set fechaSolicitud
     *
     * @param \DateTime $fechaSolicitud
     * @return VentaAsistida
     */
    public function setFechaSolicitud($fechaSolicitud)
    {
        $this->fechaSolicitud = $fechaSolicitud;

        return $this;
    }

    /**
     * Get fechaSolicitud
     *
     * @return \DateTime 
     */
    public function getFechaSolicitud()
    {
        return $this->fechaSolicitud;
    }

    /**
     * Set cliente
     *
     * @param \AppBundle\Entity\Cliente $cliente
     * @return VentaAsistida
     */
    public function setCliente(\AppBundle\Entity\Cliente $cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \AppBundle\Entity\Cliente 
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set estadoVentaAsistida
     *
     * @param \AppBundle\Entity\EstadoVentaAsistida $estadoVentaAsistida
     * @return VentaAsistida
     */
    public function setEstadoVentaAsistida(\AppBundle\Entity\EstadoVentaAsistida $estadoVentaAsistida = null)
    {
        $this->estadoVentaAsistida = $estadoVentaAsistida;

        return $this;
    }

    /**
     * Get estadoVentaAsistida
     *
     * @return \AppBundle\Entity\EstadoVentaAsistida 
     */
    public function getEstadoVentaAsistida()
    {
        return $this->estadoVentaAsistida;
    }
}
