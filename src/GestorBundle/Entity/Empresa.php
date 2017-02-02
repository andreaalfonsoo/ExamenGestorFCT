<?php

namespace GestorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Empresa
 *
 * @ORM\Table(name="empresa")
 * @ORM\Entity(repositoryClass="GestorBundle\Repository\EmpresaRepository")
 */
class Empresa
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
     * @ORM\Column(name="nombreEmpresa", type="string", length=256)
     */
    private $nombreEmpresa;

    /**
     * @var string
     *
     * @ORM\Column(name="direccionEmpresa", type="string", length=512)
     */
    private $direccionEmpresa;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=5)
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono1Empresa", type="string", length=12)
     */
    private $telefono1Empresa;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono2Empresa", type="string", length=12)
     */
    private $telefono2Empresa;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaCreacionEmpresa", type="datetime")
     */
    private $fechaCreacionEmpresa;

    /**
     * @ORM\OneToMany(targetEntity="Alumno", mappedBy="empresa")
     */
    private $alumno;

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
     * Set nombreEmpresa
     *
     * @param string $nombreEmpresa
     *
     * @return Empresa
     */
    public function setNombreEmpresa($nombreEmpresa)
    {
        $this->nombreEmpresa = $nombreEmpresa;

        return $this;
    }

    /**
     * Get nombreEmpresa
     *
     * @return string
     */
    public function getNombreEmpresa()
    {
        return $this->nombreEmpresa;
    }

    /**
     * Set direccionEmpresa
     *
     * @param string $direccionEmpresa
     *
     * @return Empresa
     */
    public function setDireccionEmpresa($direccionEmpresa)
    {
        $this->direccionEmpresa = $direccionEmpresa;

        return $this;
    }

    /**
     * Get direccionEmpresa
     *
     * @return string
     */
    public function getDireccionEmpresa()
    {
        return $this->direccionEmpresa;
    }

    /**
     * Set cp
     *
     * @param string $cp
     *
     * @return Empresa
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set telefono1Empresa
     *
     * @param string $telefono1Empresa
     *
     * @return Empresa
     */
    public function setTelefono1Empresa($telefono1Empresa)
    {
        $this->telefono1Empresa = $telefono1Empresa;

        return $this;
    }

    /**
     * Get telefono1Empresa
     *
     * @return string
     */
    public function getTelefono1Empresa()
    {
        return $this->telefono1Empresa;
    }

    /**
     * Set telefono2Empresa
     *
     * @param string $telefono2Empresa
     *
     * @return Empresa
     */
    public function setTelefono2Empresa($telefono2Empresa)
    {
        $this->telefono2Empresa = $telefono2Empresa;

        return $this;
    }

    /**
     * Get telefono2Empresa
     *
     * @return string
     */
    public function getTelefono2Empresa()
    {
        return $this->telefono2Empresa;
    }

    /**
     * Set fechaCreacionEmpresa
     *
     * @param \DateTime $fechaCreacionEmpresa
     *
     * @return Empresa
     */
    public function setFechaCreacionEmpresa($fechaCreacionEmpresa)
    {
        $this->fechaCreacionEmpresa = $fechaCreacionEmpresa;

        return $this;
    }

    /**
     * Get fechaCreacionEmpresa
     *
     * @return \DateTime
     */
    public function getFechaCreacionEmpresa()
    {
        return $this->fechaCreacionEmpresa;
    }
}
