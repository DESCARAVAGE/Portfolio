<?php

namespace App\Entity;

use App\Repository\ProfilRepository;
use Doctrine\ORM\Mapping as ORM;
use PHPStan\Type\Doctrine\Descriptors\TextType;

#[ORM\Entity(repositoryClass: ProfilRepository::class)]
class Profil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $dan;

    #[ORM\Column(type: 'text')]
    private TextType $description;

    #[ORM\Column(type: 'text')]
    private TextType $purpose;

    #[ORM\Column(type: 'text')]
    private TextType $moreDetail;

    #[ORM\Column(type: 'string', length: 255)]
    private string $image;

    #[ORM\Column(type: 'string', length: 255)]
    private string $curriculumVitae;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMe(): ?string
    {
        return $this->dan;
    }

    public function setMe(string $dan): self
    {
        $this->dan = $dan;

        return $this;
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

    public function getPurpose(): TextType
    {
        return $this->purpose;
    }

    public function setPurpose(TextType $purpose): self
    {
        $this->purpose = $purpose;

        return $this;
    }

    public function getMoreDetail(): TextType
    {
        return $this->moreDetail;
    }

    public function setMoreDetail(TextType $moreDetail): self
    {
        $this->moreDetail = $moreDetail;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getcurriculumVitae(): ?string
    {
        return $this->curriculumVitae;
    }

    public function setcurriculumVitae(string $curriculumVitae): self
    {
        $this->curriculumVitae = $curriculumVitae;

        return $this;
    }
}
