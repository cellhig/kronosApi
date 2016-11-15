<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Migration
 *
 * @ORM\Table(name="migration")
 * @ORM\Entity
 */
class Migration
{
    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=180)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $version;

    /**
     * @var integer
     *
     * @ORM\Column(name="apply_time", type="integer", nullable=true)
     */
    private $applyTime;



    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set applyTime
     *
     * @param integer $applyTime
     * @return Migration
     */
    public function setApplyTime($applyTime)
    {
        $this->applyTime = $applyTime;

        return $this;
    }

    /**
     * Get applyTime
     *
     * @return integer 
     */
    public function getApplyTime()
    {
        return $this->applyTime;
    }
}
