<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cargo
 *
 * @ORM\Table(name="cargo", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class Cargo
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
     * @ORM\Column(name="nombre_cargo", type="string", length=45, nullable=true)
     */
    private $nombreCargo;



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
     * Set nombreCargo
     *
     * @param string $nombreCargo
     * @return Cargo
     */
    public function setNombreCargo($nombreCargo)
    {
        $this->nombreCargo = $nombreCargo;

        return $this;
    }

    /**
     * Get nombreCargo
     *
     * @return string 
     */
    public function getNombreCargo()
    {
        return $this->nombreCargo;
    }
}
