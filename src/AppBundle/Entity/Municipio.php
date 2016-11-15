<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Municipio
 *
 * @ORM\Table(name="municipio", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_municipio_departamento1_idx", columns={"departamento_id"})})
 * @ORM\Entity
 */
class Municipio
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
     * @ORM\Column(name="nombre_municipio", type="string", length=25, nullable=true)
     */
    private $nombreMunicipio;

    /**
     * @var \AppBundle\Entity\Departamento
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Departamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="departamento_id", referencedColumnName="id")
     * })
     */
    private $departamento;



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
     * Set nombreMunicipio
     *
     * @param string $nombreMunicipio
     * @return Municipio
     */
    public function setNombreMunicipio($nombreMunicipio)
    {
        $this->nombreMunicipio = $nombreMunicipio;

        return $this;
    }

    /**
     * Get nombreMunicipio
     *
     * @return string 
     */
    public function getNombreMunicipio()
    {
        return $this->nombreMunicipio;
    }

    /**
     * Set departamento
     *
     * @param \AppBundle\Entity\Departamento $departamento
     * @return Municipio
     */
    public function setDepartamento(\AppBundle\Entity\Departamento $departamento = null)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return \AppBundle\Entity\Departamento 
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }
}
