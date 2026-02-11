<?php

namespace App\Entity;

use App\Repository\AlumnoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: "AlumnoRepository")]
class Alumno
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id;

    #[ORM\Column(type: "string")]
    private ?string $nombre;

    #[ORM\Column(type: "string")]
    private ?string $apellidos;

    #[ORM\Column(type: "date")]
    private ?\DateTime $fechaNacimiento;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $observaciones;

    #[ORM\ManyToOne(targetEntity: "Grupo", inversedBy: "alumnado")]
    private ?Grupo $grupo;

    #[ORM\OneToMany(targetEntity: "Parte", mappedBy: "alumno")]
    private Collection $partes;

    /**
     * Convertir alumno en una cadena
     */
    public function __toString()
    {
        return $this->getApellidos() . ', ' . $this->getNombre() . ' (' . $this->getGrupo() . ')';
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->partes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): Alumno
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): Alumno
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    public function getFechaNacimiento(): ?\DateTime
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento(\DateTime $fechaNacimiento): Alumno
    {
        $this->fechaNacimiento = $fechaNacimiento;
        return $this;
    }

    public function getObservaciones(): ?string
    {
        return $this->observaciones;
    }

    public function setObservaciones(?string $observaciones): Alumno
    {
        $this->observaciones = $observaciones;
        return $this;
    }

    public function getGrupo(): ?Grupo
    {
        return $this->grupo;
    }

    public function setGrupo(Grupo $grupo): Alumno
    {
        $this->grupo = $grupo;
        return $this;
    }

    /**
     * @return Collection<int, Parte>
     */
    public function getPartes(): Collection
    {
        return $this->partes;
    }

    public function setPartes(Collection $partes): Alumno
    {
        $this->partes = $partes;
        return $this;
    }
}
