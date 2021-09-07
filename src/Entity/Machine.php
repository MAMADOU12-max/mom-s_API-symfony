<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MachineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=MachineRepository::class)
 */
class Machine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("variationmasse:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $keymachine;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $localisation;

    /**
     * @ORM\OneToMany(targetEntity=VariationTemperature::class, mappedBy="machine")
     */
    private $variationTemperatures;

    /**
     * @ORM\OneToMany(targetEntity=VariationMasse::class, mappedBy="machine")
     */
    private $variationMasses;

    public function __construct()
    {
        $this->variationTemperatures = new ArrayCollection();
        $this->variationMasses = new ArrayCollection();
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
     * @return Collection|VariationTemperature[]
     */
    public function getVariationTemperatures(): Collection
    {
        return $this->variationTemperatures;
    }

    public function addVariationTemperature(VariationTemperature $variationTemperature): self
    {
        if (!$this->variationTemperatures->contains($variationTemperature)) {
            $this->variationTemperatures[] = $variationTemperature;
            $variationTemperature->setMachine($this);
        }

        return $this;
    }

    public function removeVariationTemperature(VariationTemperature $variationTemperature): self
    {
        if ($this->variationTemperatures->removeElement($variationTemperature)) {
            // set the owning side to null (unless already changed)
            if ($variationTemperature->getMachine() === $this) {
                $variationTemperature->setMachine(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|VariationMasse[]
     */
    public function getVariationMasses(): Collection
    {
        return $this->variationMasses;
    }

    public function addVariationMass(VariationMasse $variationMass): self
    {
        if (!$this->variationMasses->contains($variationMass)) {
            $this->variationMasses[] = $variationMass;
            $variationMass->setMachine($this);
        }

        return $this;
    }

    public function removeVariationMass(VariationMasse $variationMass): self
    {
        if ($this->variationMasses->removeElement($variationMass)) {
            // set the owning side to null (unless already changed)
            if ($variationMass->getMachine() === $this) {
                $variationMass->setMachine(null);
            }
        }

        return $this;
    }
}
