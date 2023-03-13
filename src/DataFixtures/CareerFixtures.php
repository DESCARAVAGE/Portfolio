<?php

namespace App\DataFixtures;

use App\Entity\Career;
use Faker\Factory;
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
