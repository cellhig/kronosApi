<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoUsuario
 *
 * @ORM\Table(name="tipo_usuario")
 * @ORM\Entity
 */
class TipoUsuario
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
     * @ORM\Column(name="tipo_usuario_nombre", type="string", length=45, nullable=false)
     */
    private $tipoUsuarioNombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo_usuario_valor", type="integer", nullable=false)
     */
    private $tipoUsuarioValor;



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
     * Set tipoUsuarioNombre
     *
     * @param string $tipoUsuarioNombre
     * @return TipoUsuario
     */
    public function setTipoUsuarioNombre($tipoUsuarioNombre)
    {
        $this->tipoUsuarioNombre = $tipoUsuarioNombre;

        return $this;
    }

    /**
     * Get tipoUsuarioNombre
     *
     * @return string 
     */
    public function getTipoUsuarioNombre()
    {
        return $this->tipoUsuarioNombre;
    }

    /**
     * Set tipoUsuarioValor
     *
     * @param integer $tipoUsuarioValor
     * @return TipoUsuario
     */
    public function setTipoUsuarioValor($tipoUsuarioValor)
    {
        $this->tipoUsuarioValor = $tipoUsuarioValor;

        return $this;
    }

    /**
     * Get tipoUsuarioValor
     *
     * @return integer 
     */
    public function getTipoUsuarioValor()
    {
        return $this->tipoUsuarioValor;
    }
}
