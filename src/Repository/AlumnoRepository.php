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
        return $this->createQueryBuilder('a')
            ->where('a.nombre = :nombre')
            ->setParameter('nombre', $nombre)
            ->getQuery()
            ->getResult();


    }

    public function findByExcludingName(string $nombre)
    {
        return $this->createQueryBuilder('a')
            ->where('a.nombre != :nombre')
            ->setParameter('nombre', $nombre)
            ->getQuery()
            ->getResult();
    }

    public function findByFirstSurname(string $apellido)
    {
        return $this->createQueryBuilder('a')
            ->where('a.apellido1 = :ape')
            ->setParameter('ape', $apellido)
            ->orderBy('a.nombre', 'ASC')
            ->getQuery()
            ->getResult();

    }

    public function findByYear(int $year)
    {
        return $this->createQueryBuilder('a')
            ->where('YEAR(a.fechaNacimiento) = :year')
            ->setParameter('year', $year)
            ->getQuery()
            ->getResult();


    }

    public function findByNoneParte()
    {
        return $this->createQueryBuilder('a')
            ->leftJoin('a.partes', 'p')
            ->where('p.id IS NULL')
            ->getQuery()
            ->getResult();
    }

}