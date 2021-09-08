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
     * @ORM\ManyToOne(targetEntity=Machines::class, inversedBy="VariationMasse")
       * @ApiSubresource()
     */
    private $machines;

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

    public function getMachines(): ?Machines
    {
        return $this->machines;
    }

    public function setMachines(?Machines $machines): self
    {
        $this->machines = $machines;

        return $this;
    }
}
