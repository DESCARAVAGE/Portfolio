<?php

namespace App\DataFixtures;

use App\Entity\Techno;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TechnoFixtures extends Fixture
{
    public const TECHNOS = [
        'HTML' => './build/images/Technos/html.png',
        'CSS' => './build/images/Technos/css.png',
        'Sass' => './build/images/Technos/sass.png',
        'Bootstrap' => './build/images/Technos/bootstrap.png',
        'PHP' => './build/images/Technos/php.png',
        'Symfony' => './build/images/Technos/symfony.png',
        'Twig' => './build/images/Technos/twig.png',
        'MySql' => './build/images/Technos/mysql.png',
        'Figma' => './build/images/Technos/figma.svg',
        'React' => './build/images/Technos/react.webp',
        'Canvas' => './build/images/Technos/canva.png',
        'WordPress' => './build/images/Technos/wordpress.png',
        'WooCommerce' => './build/images/Technos/woocommerce.png',
        'JS' => './build/images/Technos/JS.png',
    ];

    public function load(ObjectManager $mananger): void
    {
        foreach (self::TECHNOS as $title => $image) {
            $technos = new Techno();

            $technos->setTitle($title);
            $technos->setImage($image);
            $this->addReference('technos_' . $title, $technos);
            $mananger->persist($technos);
        }
        $mananger->flush();
    }
}
