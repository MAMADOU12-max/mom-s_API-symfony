<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MachinesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *    denormalizationContext={"groups"={"machines:write"}} ,   
 *    normalizationContext={"groups"={"machines:read"}} ,   
 * )
 * @ORM\Entity(repositoryClass=MachinesRepository::class)
 */
class Machines
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"machines:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("machines:write")
     * @Groups({"machines:read"})
     */
    private $keymachine;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("machines:write")
     * @Groups({"machines:read"})
     */
    private $localisation;

    /**
     * @ORM\OneToMany(targetEntity=VariationMasse::class, mappedBy="machines",cascade={"persist"})
     * @Groups({"machines:read"})
     */
    private $VariationMasse;

    public function __construct()
    {
        $this->VariationMasse = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKeymachine(): ?string
    {
        return $this->keymachine;
    }

    public function setKeymachine(string $keymachine): self
    {
        $this->keymachine = $keymachine;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * @return Collection|VariationMasse[]
     */
    public function getVariationMasse(): Collection
    {
        return $this->VariationMasse;
    }

    public function addVariationMasse(VariationMasse $variationMasse): self
    {
        if (!$this->VariationMasse->contains($variationMasse)) {
            $this->VariationMasse[] = $variationMasse;
            $variationMasse->setMachines($this);
        }

        return $this;
    }

    public function removeVariationMasse(VariationMasse $variationMasse): self
    {
        if ($this->VariationMasse->removeElement($variationMasse)) {
            // set the owning side to null (unless already changed)
            if ($variationMasse->getMachines() === $this) {
                $variationMasse->setMachines(null);
            }
        }

        return $this;
    }
}
