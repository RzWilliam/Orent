<?php

namespace App\Entity;

use App\Repository\SousSousFamilleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SousSousFamilleRepository::class)
 */
class SousSousFamille
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
     * @ORM\ManyToOne(targetEntity=SousFamille::class, inversedBy="sousSousFamilles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sousfamille;

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

    public function getSousfamille(): ?SousFamille
    {
        return $this->sousfamille;
    }

    public function setSousfamille(?SousFamille $sousfamille): self
    {
        $this->sousfamille = $sousfamille;

        return $this;
    }

    public function __toString():string
    {
        return $this->getName();
    }
}
