<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estado
 *
 * @ORM\Table(name="estado")
 * @ORM\Entity
 */
class Estado
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
     * @ORM\Column(name="estado_nombre", type="string", length=45, nullable=false)
     */
    private $estadoNombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado_valor", type="smallint", nullable=false)
     */
    private $estadoValor;



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
     * Set estadoNombre
     *
     * @param string $estadoNombre
     * @return Estado
     */
    public function setEstadoNombre($estadoNombre)
    {
        $this->estadoNombre = $estadoNombre;

        return $this;
    }

    /**
     * Get estadoNombre
     *
     * @return string 
     */
    public function getEstadoNombre()
    {
        return $this->estadoNombre;
    }

    /**
     * Set estadoValor
     *
     * @param integer $estadoValor
     * @return Estado
     */
    public function setEstadoValor($estadoValor)
    {
        $this->estadoValor = $estadoValor;

        return $this;
    }

    /**
     * Get estadoValor
     *
     * @return integer 
     */
    public function getEstadoValor()
    {
        return $this->estadoValor;
    }
}
