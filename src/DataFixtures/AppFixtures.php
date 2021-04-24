<?php

namespace App\DataFixtures;

use App\Entity\City;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        if (($handle = fopen(dirname(__FILE__) . "/cities.csv", "r")) !== false) {
            while (($data = fgetcsv($handle)) !== false) {
                $city = new City();
                $city->setGeonameid(intval($data[3]));
                $city->setName($data[0]);
                $city->setCountry($data[1]);
                $city->setSubcountry($data[2]);
                $manager->persist($city);
            }
            fclose($handle);
        }

        $manager->flush();
    }
}
