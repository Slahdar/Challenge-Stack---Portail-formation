<?php

namespace App\Entity;

use App\Repository\ReponseFormateurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReponseFormateurRepository::class)]
class ReponseFormateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\Column]
    private ?bool $correct = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Question $id_question = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function isCorrect(): ?bool
    {
        return $this->correct;
    }

    public function setCorrect(bool $correct): static
    {
        $this->correct = $correct;

        return $this;
    }

    public function getIdQuestion(): ?Question
    {
        return $this->id_question;
    }

    public function setIdQuestion(?Question $id_question): static
    {
        $this->id_question = $id_question;

        return $this;
    }
}
