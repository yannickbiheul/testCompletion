<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Personne;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i=0; $i < 5000; $i++) { 
            $personne = new Personne();
            $personne->setPrenom($faker->firstname);
            $personne->setNom($faker->lastname);
            $personne->setTel($faker->phoneNumber);

            $manager->persist($personne);
        }

        $manager->flush();
    }
}
