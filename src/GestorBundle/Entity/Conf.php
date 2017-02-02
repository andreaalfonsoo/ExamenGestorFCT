<?php

namespace GestorBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conf
 *
 * @ORM\Table(name="conf")
 * @ORM\Entity(repositoryClass="GestorBundle\Repository\ConfRepository")
 */
class Conf
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="param", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $param;

    /**
     * @var string
     *
     * @ORM\Column(name="configuracion", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $configuracion;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set param
     *
     * @param string $param
     *
     * @return Conf
     */
    public function setParam($param)
    {
        $this->param = $param;

        return $this;
    }

    /**
     * Get param
     *
     * @return string
     */
    public function getParam()
    {
        return $this->param;
    }

    /**
     * Set configuracion
     *
     * @param string $configuracion
     *
     * @return Conf
     */
    public function setConfiguracion($configuracion)
    {
        $this->configuracion = $configuracion;

        return $this;
    }

    /**
     * Get configuracion
     *
     * @return string
     */
    public function getConfiguracion()
    {
        return $this->configuracion;
    }
}

