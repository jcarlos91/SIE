<?php

namespace SIEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empleado
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SIEBundle\Entity\EmpleadoRepository")
 */
class Empleado
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidoP", type="string", length=255)
     */
    private $apellidoP;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidoM", type="string", length=255)
     */
    private $apellidoM;

    /**
     * @var string
     *
     * @ORM\Column(name="curp", type="string", length=255)
     */
    private $curp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaNa", type="date")
     */
    private $fechaNa;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaAlta", type="date")
     */
    private $fechaAlta;

     /**
     * @var \SIEBundle\Entity\Puesto
     * @ORM\ManyToOne(targetEntity="SIEBundle\Entity\Puesto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="puesto", referencedColumnName="id")
     *   })
     */
    private $puesto;


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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Empleado
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidoP
     *
     * @param string $apellidoP
     *
     * @return Empleado
     */
    public function setApellidoP($apellidoP)
    {
        $this->apellidoP = $apellidoP;

        return $this;
    }

    /**
     * Get apellidoP
     *
     * @return string
     */
    public function getApellidoP()
    {
        return $this->apellidoP;
    }

    /**
     * Set apellidoM
     *
     * @param string $apellidoM
     *
     * @return Empleado
     */
    public function setApellidoM($apellidoM)
    {
        $this->apellidoM = $apellidoM;

        return $this;
    }

    /**
     * Get apellidoM
     *
     * @return string
     */
    public function getApellidoM()
    {
        return $this->apellidoM;
    }

    /**
     * Set curp
     *
     * @param string $curp
     *
     * @return Empleado
     */
    public function setCurp($curp)
    {
        $this->curp = $curp;

        return $this;
    }

    /**
     * Get curp
     *
     * @return string
     */
    public function getCurp()
    {
        return $this->curp;
    }

    /**
     * Set fechaNa
     *
     * @param \DateTime $fechaNa
     *
     * @return Empleado
     */
    public function setFechaNa($fechaNa)
    {
        $this->fechaNa = $fechaNa;

        return $this;
    }

    /**
     * Get fechaNa
     *
     * @return \DateTime
     */
    public function getFechaNa()
    {
        return $this->fechaNa;
    }

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     *
     * @return Empleado
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Set Puesto
     *
     * @param \SIEBundle\Entity\Puesto $puesto
     * @return User
     */
    public function setPuesto(\SIEBundle\Entity\Puesto $puesto = null){
        $this->puesto = $puesto;

        return $this;
    }

    /**
     * GetPuesto
     *
     * @return \SIEBundle\Entity\Puesto
     */
    public function getPuesto()
    {
        return $this->puesto;
    }

    public function __construct(){
        $this->fechaAlta = new \DateTime('now');
    }
}

