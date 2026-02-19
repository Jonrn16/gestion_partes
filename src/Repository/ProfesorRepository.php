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
            ->createQuery("SELECT p FROM App\Entity\Profesor p LEFT JOIN p.partes part WHERE part IS NULL")
            ->getResult();
    }
}