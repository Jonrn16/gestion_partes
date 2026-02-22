<?php

namespace App\Repository;

use App\Entity\Grupo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class GrupoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Grupo::class);
    }

    public function findGruposConTutor() {
        return $this->createQueryBuilder('g')
            ->select('g.denominacion', 't.nombre as nombreTutor')
            ->join('g.tutor', 't')
            ->orderBy('g.denominacion', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findGruposStats() {
        return $this->createQueryBuilder('g')
            ->select('g.denominacion', 't.nombre as nombreTutor', 'count(a.id) as numAlumnos')
            ->join('g.tutor', 't')
            ->leftJoin('g.alumnos', 'a')
            ->groupBy('g.id')
            ->orderBy('g.denominacion', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findAlumnosByGrupo($grupoId) {
        return $this->getEntityManager()->createQueryBuilder()
            ->select('a')
            ->from('App\Entity\Alumno', 'a')
            ->where('a.grupo = :id')
            ->setParameter('id', $grupoId)
            ->orderBy('a.apellido1', 'ASC')
            ->addOrderBy('a.apellido2', 'ASC')
            ->addOrderBy('a.nombre', 'ASC')
            ->getQuery()
            ->getResult();
    }


}