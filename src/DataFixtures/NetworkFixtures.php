<?php

namespace App\DataFixtures;

use App\Entity\Network;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NetworkFixtures extends Fixture
{
    public const NETWORKS = [
        [
            'title' => 'Linkedin',
            'link' => 'https://www.linkedin.com/in/escaravage-daniel/'
        ],
        [
            'title' => 'Github',
            'link' => 'https://github.com/DESCARAVAGE'
        ],
        [
            'title' => 'Codewars',
            'link' => 'https://www.codewars.com/users/DESCARAVAGE'
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::NETWORKS as $networkItems) {
            $network = new Network();
            $network->setTitle($networkItems['title']);
            $network->setLink($networkItems['link']);
            $manager->persist($network);
            $this->addReference('network_' . $networkItems['title'], $network);
        }
        $manager->flush();
    }
}
