<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\ScoffTest;
use Faker;

class ScoffTestFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('fr_FR');
        for ($i=0; $i<=5; $i++) {
            $scoffTest = new ScoffTest();
            $scoffTest->setQuestion($faker->sentence(15));
            $manager->persist($scoffTest);
        }
        $manager->flush();
    }
}