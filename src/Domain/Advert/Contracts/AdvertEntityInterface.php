<?php


namespace App\Domain\Advert\Contracts;


interface AdvertEntityInterface
{
    /**
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * @param int|null $id
     * @return AdvertEntityInterface
     */
    public function setId(?int $id): AdvertEntityInterface;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return AdvertEntityInterface
     */
    public function setName(string $name): AdvertEntityInterface;

    /**
     * @return string
     */
    public function getBody(): string;

    /**
     * @param string $body
     * @return AdvertEntityInterface
     */
    public function setBody(string $body): AdvertEntityInterface;

    /**
     * @return string|null
     */
    public function getImage(): ?string;

    /**
     * @param string|null $image
     * @return AdvertEntityInterface
     */
    public function setImage(?string $image): AdvertEntityInterface;

}