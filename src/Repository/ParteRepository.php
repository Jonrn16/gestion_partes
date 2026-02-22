<?php

namespace App\Repository;

use App\Entity\Parte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ParteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Parte::class);
    }

    public function findByTexts(string $texto)
    {
        return $this->createQueryBuilder('p')
            ->where('p.observaciones LIKE :texto')
            ->setParameter('texto', '%'.$texto.'%')
            ->getQuery()
            ->getResult();
    }

}