<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empleado
 *
 * @ORM\Table(name="empleado", indexes={@ORM\Index(name="fk_empleado_persona1_idx", columns={"persona_id"}), @ORM\Index(name="fk_empleado_cargo1_idx", columns={"cargo_id"}), @ORM\Index(name="fk_empleado_sede1_idx", columns={"sede_id"})})
 * @ORM\Entity
 */
class Empleado
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
     * @ORM\Column(name="telefono_movil", type="string", length=15, nullable=true)
     */
    private $telefonoMovil;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", nullable=false)
     */
    private $estado;

    /**
     * @var \AppBundle\Entity\Cargo
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Cargo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cargo_id", referencedColumnName="id")
     * })
     */
    private $cargo;

    /**
     * @var \AppBundle\Entity\Persona
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Persona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="persona_id", referencedColumnName="id")
     * })
     */
    private $persona;

    /**
     * @var \AppBundle\Entity\Sede
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Sede")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sede_id", referencedColumnName="id")
     * })
     */
    private $sede;



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
     * Set telefonoMovil
     *
     * @param string $telefonoMovil
     * @return Empleado
     */
    public function setTelefonoMovil($telefonoMovil)
    {
        $this->telefonoMovil = $telefonoMovil;

        return $this;
    }

    /**
     * Get telefonoMovil
     *
     * @return string 
     */
    public function getTelefonoMovil()
    {
        return $this->telefonoMovil;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Empleado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set cargo
     *
     * @param \AppBundle\Entity\Cargo $cargo
     * @return Empleado
     */
    public function setCargo(\AppBundle\Entity\Cargo $cargo = null)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return \AppBundle\Entity\Cargo 
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set persona
     *
     * @param \AppBundle\Entity\Persona $persona
     * @return Empleado
     */
    public function setPersona(\AppBundle\Entity\Persona $persona = null)
    {
        $this->persona = $persona;

        return $this;
    }

    /**
     * Get persona
     *
     * @return \AppBundle\Entity\Persona 
     */
    public function getPersona()
    {
        return $this->persona;
    }

    /**
     * Set sede
     *
     * @param \AppBundle\Entity\Sede $sede
     * @return Empleado
     */
    public function setSede(\AppBundle\Entity\Sede $sede = null)
    {
        $this->sede = $sede;

        return $this;
    }

    /**
     * Get sede
     *
     * @return \AppBundle\Entity\Sede 
     */
    public function getSede()
    {
        return $this->sede;
    }
}
