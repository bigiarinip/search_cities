<?php

namespace App\Repository;

use App\Entity\City;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, City::class);
    }


    public function __getCities(string $city)
    {
        return $this->createQueryBuilder('city')
            ->where('city.name LIKE :cities')
            ->setParameter('cities', $city . '%')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }
}
