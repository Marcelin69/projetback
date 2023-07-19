<?php

// src/Service/SalleService.php

namespace App\Service;

use App\Entity\Salle;
use Doctrine\ORM\EntityManagerInterface;

class SalleService
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getSalleByAssociations($idMateriel, $idLogiciel, $idErgonomie)
    {
        $repository = $this->entityManager->getRepository(Salle::class);
        
        $query = $repository->createQueryBuilder('salle')
            ->leftJoin('salle.materiel', 'materiel')
            ->leftJoin('salle.logiciel', 'logiciel')
            ->leftJoin('salle.ergonomie', 'ergonomie')
            ->where('materiel.id = :materiel')
            ->andWhere('logiciel.id = :logiciel')
            ->andWhere('ergonomie.id = :ergonomie')
            ->setParameter('materiel', $idMateriel)
            ->setParameter('logiciel', $idLogiciel)
            ->setParameter('ergonomie', $idErgonomie)
            ->getQuery();
        
        $result = $query->getResult();
        
        return $result;
    }
}
