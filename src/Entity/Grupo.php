<?php

namespace App\Entity;

use App\Repository\GrupoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: "GrupoRepository")]
class Grupo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id;

    #[ORM\Column(type: "string")]
    private ?string $descripcion;

    #[ORM\Column(type: "integer")]
    private ?int $aula;

    #[ORM\Column(type: "integer")]
    private ?int $planta;

    #[ORM\OneToMany(targetEntity: "Alumno", mappedBy: "grupo")]
    private Collection $alumnado;

    #[ORM\OneToOne(targetEntity: "Profesor", inversedBy: "tutoria")]
    private ?Profesor $tutor;

    #[ORM\ManyToMany(targetEntity: "Profesor", mappedBy: "grupos")]
    private Collection $profesorado;

    /**
     * Convierte el grupo en una cadena
     */
    public function __toString()
    {
        return $this->getDescripcion();
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->alumnado = new ArrayCollection();
        $this->profesorado = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): Grupo
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    public function getAula(): ?int
    {
        return $this->aula;
    }

    public function setAula(int $aula): Grupo
    {
        $this->aula = $aula;
        return $this;
    }

    public function getPlanta(): ?int
    {
        return $this->planta;
    }

    public function setPlanta(int $planta): Grupo
    {
        $this->planta = $planta;
        return $this;
    }

    /**
     * @return Collection<int, Alumno>
     */
    public function getAlumnado(): Collection
    {
        return $this->alumnado;
    }

    public function setAlumnado($alumnado): Grupo
    {
        $this->alumnado = $alumnado;
        return $this;
    }

    public function getTutor(): ?Profesor
    {
        return $this->tutor;
    }

    public function setTutor(Profesor $tutor): Grupo
    {
        $this->tutor = $tutor;
        return $this;
    }

    /**
     * @return Collection<int, Profesor>
     */
    public function getProfesorado(): Collection
    {
        return $this->profesorado;
    }

    public function setProfesorado($profesorado): Grupo
    {
        $this->profesorado = $profesorado;
        return $this;
    }
}
