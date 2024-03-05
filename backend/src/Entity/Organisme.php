<?php

namespace App\Entity;

use App\Repository\OrganismeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrganismeRepository::class)]
class Organisme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\ManyToMany(targetEntity: Formateur::class)]
    private Collection $id_formateur;

    public function __construct()
    {
        $this->id_formateur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * @return Collection<int, Formateur>
     */
    public function getIdFormateur(): Collection
    {
        return $this->id_formateur;
    }

    public function addIdFormateur(Formateur $idFormateur): static
    {
        if (!$this->id_formateur->contains($idFormateur)) {
            $this->id_formateur->add($idFormateur);
        }

        return $this;
    }

    public function removeIdFormateur(Formateur $idFormateur): static
    {
        $this->id_formateur->removeElement($idFormateur);

        return $this;
    }
}
