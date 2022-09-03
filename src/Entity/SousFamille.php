<?php

namespace App\Entity;

use App\Repository\SousFamilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SousFamilleRepository::class)
 */
class SousFamille
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
     * @ORM\ManyToOne(targetEntity=Famille::class, inversedBy="sousFamilles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $famille;

    /**
     * @ORM\OneToMany(targetEntity=SousSousFamille::class, mappedBy="sousfamille")
     */
    private $sousSousFamilles;

    public function __construct()
    {
        $this->sousSousFamilles = new ArrayCollection();
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

    public function getFamille(): ?Famille
    {
        return $this->famille;
    }

    public function setFamille(?Famille $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * @return Collection<int, SousSousFamille>
     */
    public function getSousSousFamilles(): Collection
    {
        return $this->sousSousFamilles;
    }

    public function addSousSousFamille(SousSousFamille $sousSousFamille): self
    {
        if (!$this->sousSousFamilles->contains($sousSousFamille)) {
            $this->sousSousFamilles[] = $sousSousFamille;
            $sousSousFamille->setSousfamille($this);
        }

        return $this;
    }

    public function removeSousSousFamille(SousSousFamille $sousSousFamille): self
    {
        if ($this->sousSousFamilles->removeElement($sousSousFamille)) {
            // set the owning side to null (unless already changed)
            if ($sousSousFamille->getSousfamille() === $this) {
                $sousSousFamille->setSousfamille(null);
            }
        }

        return $this;
    }

    public function __toString():string
    {
        return $this->getName();
    }
}
