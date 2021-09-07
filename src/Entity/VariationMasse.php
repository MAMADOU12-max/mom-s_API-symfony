<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VariationMasseRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiSubresource;

/**
 * @ORM\Entity(repositoryClass=VariationMasseRepository::class)
 * @ApiResource(
 *      normalizationContext={"groups"={"variationmasse:read"}} ,
 *      collectionOperations={
 *          "get","post"
 *      },
 *      itemOperations ={
 *          "delete","get","put"
 *      }
 *      
 * )
 */
class VariationMasse
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     * @Groups("variationmasse:read")
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity=Machine::class, inversedBy="variationMasses")
     * @ApiSubresource()
     */
    private $machine;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function setValue(float $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getMachine(): ?Machine
    {
        return $this->machine;
    }

    public function setMachine(?Machine $machine): self
    {
        $this->machine = $machine;

        return $this;
    }
}
