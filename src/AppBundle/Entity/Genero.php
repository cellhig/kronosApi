<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genero
 *
 * @ORM\Table(name="genero")
 * @ORM\Entity
 */
class Genero
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
     * @ORM\Column(name="genero_nombre", type="string", length=45, nullable=false)
     */
    private $generoNombre;



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
     * Set generoNombre
     *
     * @param string $generoNombre
     * @return Genero
     */
    public function setGeneroNombre($generoNombre)
    {
        $this->generoNombre = $generoNombre;

        return $this;
    }

    /**
     * Get generoNombre
     *
     * @return string 
     */
    public function getGeneroNombre()
    {
        return $this->generoNombre;
    }
}
