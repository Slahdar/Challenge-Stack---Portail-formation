<?php

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoursRepository::class)]
class Cours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $duree = null;

    #[ORM\Column]
    private ?int $difficulte = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $objectif = null;

    #[ORM\Column(length: 255)]
    private ?string $categorie = null;

    #[ORM\ManyToMany(targetEntity: Classe::class)]
    private Collection $id_classe;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Formateur $id_formateur = null;

    #[ORM\OneToMany(targetEntity: Examen::class, mappedBy: 'id_cours')]
    private Collection $examens;

    public function __construct()
    {
        $this->id_classe = new ArrayCollection();
        $this->examens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): static
    {
        $this->duree = $duree;

        return $this;
    }

    public function getDifficulte(): ?int
    {
        return $this->difficulte;
    }

    public function setDifficulte(int $difficulte): static
    {
        $this->difficulte = $difficulte;

        return $this;
    }

    public function getObjectif(): ?string
    {
        return $this->objectif;
    }

    public function setObjectif(string $objectif): static
    {
        $this->objectif = $objectif;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection<int, Classe>
     */
    public function getIdClasse(): Collection
    {
        return $this->id_classe;
    }

    public function addIdClasse(Classe $idClasse): static
    {
        if (!$this->id_classe->contains($idClasse)) {
            $this->id_classe->add($idClasse);
        }

        return $this;
    }

    public function removeIdClasse(Classe $idClasse): static
    {
        $this->id_classe->removeElement($idClasse);

        return $this;
    }

    public function getIdFormateur(): ?Formateur
    {
        return $this->id_formateur;
    }

    public function setIdFormateur(?Formateur $id_formateur): static
    {
        $this->id_formateur = $id_formateur;

        return $this;
    }

    /**
     * @return Collection<int, Examen>
     */
    public function getExamens(): Collection
    {
        return $this->examens;
    }

    public function addExamen(Examen $examen): static
    {
        if (!$this->examens->contains($examen)) {
            $this->examens->add($examen);
            $examen->setIdCours($this);
        }

        return $this;
    }

    public function removeExamen(Examen $examen): static
    {
        if ($this->examens->removeElement($examen)) {
            // set the owning side to null (unless already changed)
            if ($examen->getIdCours() === $this) {
                $examen->setIdCours(null);
            }
        }

        return $this;
    }
}
