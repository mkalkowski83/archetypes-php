<?php
declare(strict_types=1);

namespace Party\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use Party\Repository\PersonRepository;

#[Entity]
#[ORM\Entity(repositoryClass: PersonRepository::class)]
final class Person extends Party
{
    #[ORM\Column(type: 'string')]
    private string $name;

    #[ORM\Column(type: 'string')]
    private string $surname;

    public function __construct(
        string $name,
        string $surname,
        string $address,
        string $phoneNumber,
        string $email,
    ) {
        parent::__construct($address, $phoneNumber, $email);
        $this->name = $name;
        $this->surname = $surname;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }
}
