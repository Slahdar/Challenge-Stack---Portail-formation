<?php

namespace App\Entity;

use App\Repository\ReponseOuverteEleveRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReponseOuverteEleveRepository::class)]
class ReponseOuverteEleve
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $note = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $text = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Question $id_question = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Etudiant $id_etudiant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): static
    {
        $this->text = $text;

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

    public function getIdEtudiant(): ?Etudiant
    {
        return $this->id_etudiant;
    }

    public function setIdEtudiant(?Etudiant $id_etudiant): static
    {
        $this->id_etudiant = $id_etudiant;

        return $this;
    }
}
