<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\UsersRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     attributes={"security"="is_granted('ROLE_USER')"},
 *     collectionOperations={
 *         "get"={
 *             "normalization_context"={"groups"={"users_read"}}
 *         },
 *         "post"={"security"="is_granted('ROLE_SUPER_ADMIN')"}
 *     },
 *     itemOperations={
 *         "get"={
 *             "normalization_context"={"groups"={"users_details_read"}}
 *         },
 *         "put"={"security"="is_granted('ROLE_ADMIN') or object.owner == user"},
 *         "delete"={"security"="is_granted('ROLE_SUPER_ADMIN')"}
 *     },
 * )
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 * @UniqueEntity("email")
 */
class Users
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"users_details_read", "clients_read", "clients_details_read"})
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"users_read", "users_details_read", "clients_read", "clients_details_read"})
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Clients::class, inversedBy="users")
     * @Groups({"users_read", "users_details_read"})
     */
    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
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

    public function getClient(): ?Clients
    {
        return $this->client;
    }

    public function setClient(?Clients $client): self
    {
        $this->client = $client;

        return $this;
    }
}
