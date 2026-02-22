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

    public function findByNoneparte()
    {
        return $this->getEntityManager()
            ->createQuery("SELECT p 
FROM App\Entity\Profesor p 
WHERE p.id NOT IN (
    SELECT DISTINCT prof.id 
    FROM App\Entity\Parte part 
    JOIN part.profesor prof
)")
            ->getResult();
    }
}