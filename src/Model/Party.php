<?php
declare(strict_types=1);

namespace Party\Model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\InheritanceType;

#[Entity]
#[InheritanceType('SINGLE_TABLE')]
#[DiscriminatorColumn(name: 'discr', type: 'string')]
#[DiscriminatorMap(['person' => Person::class, 'organization' => Organization::class])]
class Party
{
    #[GeneratedValue]
    #[Column(type: 'integer')]
    #[Id]
    private int $id;

    #[Column(type: 'string')]
    private string $address;

    #[Column(type: 'string')]
    private string $phoneNumber;

    #[Column(type: 'string')]
    private string $email;

    public function __construct(
        string $address,
        string $phoneNumber,
        string $email,
    ) {
        $this->address = $address;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
