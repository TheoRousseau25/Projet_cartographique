<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CriteresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use SplObserver;

#[ORM\Entity(repositoryClass: CriteresRepository::class)]
#[ApiResource]
class Criteres
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $critere = null;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: PointInteret::class)]
    private Collection $pointInterets;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCritere(): ?string
    {
        return $this->critere;
    }

    public function setCritere(string $critere): self
    {
        $this->critere = $critere;
        return $this;
    }

    public function __construct()
    {
        $this->pointInterets = new ArrayCollection();
    }

    /**
     * @return Collection<int, PointInteret>
     */
    public function getPointInterets(): Collection
    {
        return $this->pointInterets;
    }

    public function addPointInteret(PointInteret $pointInteret): self
    {
        if (!$this->pointInterets->contains($pointInteret)) {
            $this->pointInterets->add($pointInteret);
            $pointInteret->setType($this);
        }

        return $this;
    }

    public function removePointInteret(PointInteret $pointInteret): self
    {
        if ($this->pointInterets->removeElement($pointInteret)) {
            // set the owning side to null (unless already changed)
            if ($pointInteret->getType() === $this) {
                $pointInteret->setType(null);
            }
        }

        return $this;
    }

}
