<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column]
    private ?int $nb_point = null;

    #[ORM\Column]
    private ?bool $question_ouverte = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Examen $id_examen = null;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getNbPoint(): ?int
    {
        return $this->nb_point;
    }

    public function setNbPoint(int $nb_point): static
    {
        $this->nb_point = $nb_point;

        return $this;
    }

    public function isQuestionOuverte(): ?bool
    {
        return $this->question_ouverte;
    }

    public function setQuestionOuverte(bool $question_ouverte): static
    {
        $this->question_ouverte = $question_ouverte;

        return $this;
    }

    public function getIdExamen(): ?Examen
    {
        return $this->id_examen;
    }

    public function setIdExamen(?Examen $id_examen): static
    {
        $this->id_examen = $id_examen;

        return $this;
    }
}
