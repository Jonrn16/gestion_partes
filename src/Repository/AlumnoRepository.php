<?php

namespace App\Repository;

use App\Entity\Alumno;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AlumnoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Alumno::class);
    }

    public function findbyName(string $nombre): array
    {
        return $this->getEntityManager()
            ->createQuery("select a from App\Entity\Alumno a where a.nombre = :nombre")
            ->setParameter("nombre", $nombre)
            ->getResult();


    }

    public function findByExcludingName(string $nombre)
    {
        return $this->getEntityManager()
            ->createQuery("select a from App\Entity\Alumno a where a.nombre != :nombre")
            ->setParameter("nombre", $nombre)
            ->getResult();
    }

    public function findByFirstSurname(string $apellido)
    {
        return $this->getEntityManager()
            ->createQuery("select a from App\Entity\Alumno a where a.apellidos like :apellido")
            ->setParameter("apellido", "$apellido %")
            ->getResult();

    }

    public function findByYear(int $year)
    {
        return $this->getEntityManager()
            ->createQuery("select a from App\Entity\Alumno a where a.fechaNacimiento between :fechaInicio and :fechaFin")
            ->setParameter("fechaInicio", "$year-01-01")
            ->setParameter("fechaFin", "$year-12-31")
            ->getResult();


    }

    public function findByNoneParte()
    {
        return $this->getEntityManager()
            ->createQuery("SELECT a FROM App\Entity\Alumno a WHERE a.id NOT IN (SELECT alumno.id FROM App\Entity\Parte part JOIN part.alumno alumno)")
            ->getResult();
    }

}