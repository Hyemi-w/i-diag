<?php


namespace App\DataFixtures;

use App\Entity\Test;
use Faker;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TestFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i=0; $i<=4; $i++) {
            $scoffTest = new Test();
            $scoffTest->setQuestion($faker->sentence(15));
            $manager->persist($scoffTest);
        }
        $manager->flush();
    }
}