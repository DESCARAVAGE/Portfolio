<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Profil;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProfilFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        $profil = new Profil();

        $profil->setDan('ESCARAVAGE Daniel');
        $profil->setDescription($faker->sentence());
        $profil->setPurpose($faker->sentence());
        $profil->setPurpose($faker->sentence());
        $profil->setMoreDetail($faker->sentence());
        $profil->setcurriculumVitae($faker->word());
        $manager->persist($profil);
        $manager->flush();
    }
}
