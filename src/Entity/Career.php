<?php

namespace App\Entity;

use App\Repository\CareerRepository;
use Doctrine\ORM\Mapping as ORM;
use PHPStan\Type\Doctrine\Descriptors\TextType;

#[ORM\Entity(repositoryClass: CareerRepository::class)]
class Career
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'text', nullable: true)]
    private TextType $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): TextType
    {
        return $this->description;
    }

    public function setDescription(TextType $description): self
    {
        $this->description = $description;

        return $this;
    }
}
