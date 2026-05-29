<?php

declare(strict_types=1);

namespace App\Domain\Customer\Entities;

class Customer
{
    public function __construct(
        private string $name,
        private string $phone,
        private ?string $cpf = null,
        private readonly ?int $id = null
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function updateDetails(string $name, string $phone, ?string $cpf = null): void
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->cpf = $cpf;
    }
}
