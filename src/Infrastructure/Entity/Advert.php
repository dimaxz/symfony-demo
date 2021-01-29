<?php

namespace App\Infrastructure\Entity;

use App\Domain\Advert\Contracts\AdvertEntityInterface;
use App\Infrastructure\Repository\AdvertRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdvertRepository::class)
 */
class Advert implements AdvertEntityInterface
{
    /**
     * @var int|null
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer", unique=true)
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(name="body", type="text", length=65535)
     */
    private $body;

    /**
     * @var string|null
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Advert
     */
    public function setId(?int $id): AdvertEntityInterface
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Advert
     */
    public function setName(string $name): AdvertEntityInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     * @return Advert
     */
    public function setBody(string $body): AdvertEntityInterface
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     * @return Advert
     */
    public function setImage(?string $image): AdvertEntityInterface
    {
        $this->image = $image;
        return $this;
    }

}
