<?php

namespace App\Entity;

use App\Repository\FamilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FamilleRepository::class)
 */
class Famille
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=SousFamille::class, mappedBy="famille")
     */
    private $sousFamilles;

    public function __construct()
    {
        $this->sousFamilles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, SousFamille>
     */
    public function getSousFamilles(): Collection
    {
        return $this->sousFamilles;
    }

    public function addSousFamille(SousFamille $sousFamille): self
    {
        if (!$this->sousFamilles->contains($sousFamille)) {
            $this->sousFamilles[] = $sousFamille;
            $sousFamille->setFamille($this);
        }

        return $this;
    }

    public function removeSousFamille(SousFamille $sousFamille): self
    {
        if ($this->sousFamilles->removeElement($sousFamille)) {
            // set the owning side to null (unless already changed)
            if ($sousFamille->getFamille() === $this) {
                $sousFamille->setFamille(null);
            }
        }

        return $this;
    }

    public function __toString():string
    {
        return $this->getName();
    }
}
