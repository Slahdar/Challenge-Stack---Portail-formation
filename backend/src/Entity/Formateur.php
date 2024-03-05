<?php

namespace App\Entity;

use App\Repository\FormateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormateurRepository::class)]
class Formateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $id_utilisateur = null;

    #[ORM\ManyToMany(targetEntity: Organisme::class)]
    private Collection $id_organisme;

    public function __construct()
    {
        $this->id_organisme = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUtilisateur(): ?Utilisateur
    {
        return $this->id_utilisateur;
    }

    public function setIdUtilisateur(?Utilisateur $id_utilisateur): static
    {
        $this->id_utilisateur = $id_utilisateur;

        return $this;
    }

    /**
     * @return Collection<int, Organisme>
     */
    public function getIdOrganisme(): Collection
    {
        return $this->id_organisme;
    }

    public function addIdOrganisme(Organisme $idOrganisme): static
    {
        if (!$this->id_organisme->contains($idOrganisme)) {
            $this->id_organisme->add($idOrganisme);
        }

        return $this;
    }

    public function removeIdOrganisme(Organisme $idOrganisme): static
    {
        $this->id_organisme->removeElement($idOrganisme);

        return $this;
    }
}
