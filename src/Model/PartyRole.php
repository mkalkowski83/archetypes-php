<?php
declare(strict_types=1);

namespace Party\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[ORM\Entity]
#[ORM\Table(name: 'party_roles')]
class PartyRole
{
    #[GeneratedValue]
    #[Column(type: 'integer')]
    #[Id]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Party::class)]
    #[ORM\JoinColumn(name: 'party_id', referencedColumnName: 'id', nullable: false)]
    private Party $party;

    #[ORM\Embedded(class: PartyRoleType::class)]
    private PartyRoleType $type;

    public function __construct(
        Party $party,
        PartyRoleType $type
    ) {
        $this->party = $party;
        $this->type = $type;
    }

    public function getId(): int
    {
        return $this->id;
    }
}

