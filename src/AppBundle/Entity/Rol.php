<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rol
 *
 * @ORM\Table(name="rol")
 * @ORM\Entity
 */
class Rol
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="rol_nombre", type="string", length=45, nullable=false)
     */
    private $rolNombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="rol_valor", type="integer", nullable=false)
     */
    private $rolValor;



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
     * Set rolNombre
     *
     * @param string $rolNombre
     * @return Rol
     */
    public function setRolNombre($rolNombre)
    {
        $this->rolNombre = $rolNombre;

        return $this;
    }

    /**
     * Get rolNombre
     *
     * @return string 
     */
    public function getRolNombre()
    {
        return $this->rolNombre;
    }

    /**
     * Set rolValor
     *
     * @param integer $rolValor
     * @return Rol
     */
    public function setRolValor($rolValor)
    {
        $this->rolValor = $rolValor;

        return $this;
    }

    /**
     * Get rolValor
     *
     * @return integer 
     */
    public function getRolValor()
    {
        return $this->rolValor;
    }
}
