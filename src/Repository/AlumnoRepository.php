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
    public function findbyName(string $nombre) : array
    {
        return $this->getEntityManager()
            ->createQuery("select * from App\Entity\Alumno where nombre = :nombre")
            ->setParameter(":nombre",$nombre)
            ->getResult();


    }

}