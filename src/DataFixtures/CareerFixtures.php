<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Career;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CareerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $career = new Career();

        $career->setDescription($faker->text());
        $manager->persist($career);
        $manager->flush();
    }
}
