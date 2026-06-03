<?php

declare(strict_types=1);

namespace App\Domain\Customer\List\Entities;

readonly class Customer
{
    public function __construct(
        private int     $id,
        private string  $name,
        private string  $phone,
        private ?string $cpf = null,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
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
}
