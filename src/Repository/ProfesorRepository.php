<?php

namespace App\Repository;

use App\Entity\Profesor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ProfesorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Profesor::class);
    }

    public function findPartesByProfesor($profesorId) {
        return $this->getEntityManager()->createQueryBuilder()
            ->select('p', 'a')
            ->from('App\Entity\Parte', 'p')
            ->join('p.alumno', 'a')
            ->where('p.profesor = :prof')
            ->setParameter('prof', $profesorId)
            ->orderBy('p.fecha', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByNoneparte()
    {
        return $this->createQueryBuilder('pr')
            ->leftJoin('pr.partes', 'pa')
            ->where('pa.id IS NULL')
            ->getQuery()
            ->getResult();
    }
}