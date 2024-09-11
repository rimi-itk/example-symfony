<?php

namespace App\Entity;

use App\Repository\PersonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonRepository::class)]
class Person
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, Address>
     */
    #[ORM\ManyToMany(targetEntity: Address::class, inversedBy: 'people')]
    private Collection $address;

    #[ORM\ManyToOne]
    private ?Address $primaryAddress = null;

    public function __construct()
    {
        $this->address = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->getName() ?? self::class;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Address>
     */
    public function getAddress(): Collection
    {
        return $this->address;
    }

    public function addAddress(Address $address): static
    {
        if (!$this->address->contains($address)) {
            $this->address->add($address);
        }

        return $this;
    }

    public function removeAddress(Address $address): static
    {
        $this->address->removeElement($address);

        return $this;
    }

    public function getPrimaryAddress(): ?Address
    {
        return $this->primaryAddress;
    }

    public function setPrimaryAddress(?Address $primaryAddress): static
    {
        $this->primaryAddress = $primaryAddress;

        return $this;
    }
}
