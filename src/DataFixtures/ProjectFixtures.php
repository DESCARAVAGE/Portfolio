<?php

namespace App\DataFixtures;

use App\Entity\Project;
use App\Service\Slugify;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;

class ProjectFixtures extends Fixture
{
    public const PROJECT_NUMBER = 8;

    private Slugify $slugify;
    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < self::PROJECT_NUMBER; $i++) {
            $project = new Project();

            $project->setTitle($faker->name());
            $project->setSlug($this->slugify->generate($project->getTitle()));
            $project->setDescription($faker->sentences(3, true));
            $project->setLink($faker->sentence());
            $manager->persist($project);
            $this->addReference('project_' . $i, $project);
        }
        $manager->flush();
    }
}
