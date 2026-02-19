<?php

namespace App\Entity;

use App\Repository\ProfesorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: "ProfesorRepository")]
class Profesor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id;

    #[ORM\Column(type: "string", length: 10)]
    private ?string $dni;

    #[ORM\Column(type: "string")]
    private ?string $nombre;

    #[ORM\Column(type: "string")]
    private ?string $apellidos;

    #[ORM\OneToMany(targetEntity: "Parte", mappedBy: "profesor")]
    private Collection $partes;

    #[ORM\OneToOne(targetEntity: "Grupo", mappedBy: "tutor")]
    private ?Grupo $tutoria;

    #[ORM\ManyToMany(targetEntity: "Grupo", inversedBy: "profesorado")]
    private Collection $grupos;

    /**
     *
     */
    public function __toString()
    {
        return $this->getNombre() . ' ' . $this->getApellidos();
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->partes = new ArrayCollection();
        $this->grupos = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDni(): ?string
    {
        return $this->dni;
    }

    /**
     * @param string $dni
     * @return Profesor
     */
    public function setDni(string $dni): Profesor
    {
        $this->dni = $dni;
        return $this;
    }

    /**
     * @return string
     */
    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return Profesor
     */
    public function setNombre(string $nombre): Profesor
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     * @return Profesor
     */
    public function setApellidos(string $apellidos): Profesor
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    /**
     * @return Parte[]|Collection
     */
    public function getPartes(): ?Collection
    {
        return $this->partes;
    }

    /**
     * @param Parte[]|Collection $partes
     * @return Profesor
     */
    public function setPartes($partes): Profesor
    {
        $this->partes = $partes;
        return $this;
    }

    /**
     * @return Grupo|null
     */
    public function getTutoria(): ?Grupo
    {
        return $this->tutoria;
    }

    /**
     * @param Grupo|null $tutoria
     * @return Profesor
     */
    public function setTutoria(?Grupo $tutoria): Profesor
    {
        $this->tutoria = $tutoria;
        return $this;
    }

    /**
     * @return Collection<int, Grupo>
     */
    public function getGrupos(): Collection
    {
        return $this->grupos;
    }

    public function setGrupos($grupos): Profesor
    {
        $this->grupos = $grupos;
        return $this;
    }
}
