<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\PhonesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     attributes={"security"="is_granted('ROLE_USER')"},
 *     collectionOperations={
 *         "get"={
 *             "normalization_context"={"groups"={"details"}}
 *         },
 *         "post"={"security"="is_granted('ROLE_SUPER_ADMIN')"}
 *     },
 *     itemOperations={
 *         "get"={
 *             "normalization_context"={"groups"={"phones_details"}}
 *         },
 *         "put"={"security"="is_granted('ROLE_SUPER_ADMIN') or object.owner == user"},
 *         "delete"={"security"="is_granted('ROLE_SUPER_ADMIN')"}
 *     }
 * )
 * @ORM\Entity(repositoryClass=PhonesRepository::class)
 */
class Phones
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"details", "phones_details"})
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"details", "phones_details"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"phones_details"})
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"phones_details"})
     */
    private $color;

    /**
     * @ORM\Column(type="float")
     * @Groups({"phones_details"})
     */
    private $price;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }
}
