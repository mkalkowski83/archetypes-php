<?php
declare(strict_types=1);

namespace Party\Command;


final class CreateOrganization
{
    public function __construct(
        private string $address,
        private string $phoneNumber,
        private string $email,
    ) {
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

}
