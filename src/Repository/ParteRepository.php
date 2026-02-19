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
        return $this->getEntityManager()
            ->createQuery("select p from \Entity\Parte p where p.observaciones like :texto")
            ->setParameter("texto", "%" . $texto . "%")
            ->getResult();
    }

}