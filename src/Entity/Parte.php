<?php

namespace App\Entity;

use App\Repository\ParteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: "ParteRepository")]
class Parte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id;

    #[ORM\ManyToOne(targetEntity: "Alumno", inversedBy: "partes")]
    private ?Alumno $alumno;

    #[ORM\ManyToOne(targetEntity: "Profesor", inversedBy: "partes")]
    private ?Profesor $profesor;

    #[ORM\Column(type: "date")]
    private ?\DateTime $fechaCreacion;

    #[ORM\Column(type: "boolean")]
    private ?bool $avisado;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $observaciones;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlumno(): ?Alumno
    {
        return $this->alumno;
    }

    public function setAlumno(Alumno $alumno): Parte
    {
        $this->alumno = $alumno;
        return $this;
    }

    public function getProfesor(): ?Profesor
    {
        return $this->profesor;
    }

    public function setProfesor(Profesor $profesor): Parte
    {
        $this->profesor = $profesor;
        return $this;
    }

    public function getFechaCreacion(): ?\DateTime
    {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion(\DateTime $fechaCreacion): Parte
    {
        $this->fechaCreacion = $fechaCreacion;
        return $this;
    }

    public function isAvisado(): ?bool
    {
        return $this->avisado;
    }

    public function setAvisado(bool $avisado): Parte
    {
        $this->avisado = $avisado;
        return $this;
    }

    public function getObservaciones(): ?string
    {
        return $this->observaciones;
    }

    public function setObservaciones(?string $observaciones): Parte
    {
        $this->observaciones = $observaciones;
        return $this;
    }
}
