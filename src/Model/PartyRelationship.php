<?php
declare(strict_types=1);

namespace Party\Model;


use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'party_relationships')]
class PartyRelationship
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: PartyRole::class)]
    #[ORM\JoinColumn(name: 'client_party_role_id', referencedColumnName: 'id', nullable: false)]
    private PartyRole $clientPartyRoleId;

    #[ORM\ManyToOne(targetEntity: PartyRole::class)]
    #[ORM\JoinColumn(name: 'client_supplier_id', referencedColumnName: 'id', nullable: false)]
    private PartyRole $clientSupplierId;

    #[ORM\Embedded(class: PartyRelationshipType::class)]
    private PartyRelationshipType $type;

    public function __construct(
        PartyRole $clientPartyRoleId,
        PartyRole $clientSupplierId,
        PartyRelationshipType $type
    ) {
        $this->clientPartyRoleId = $clientPartyRoleId;
        $this->clientSupplierId = $clientSupplierId;
        $this->type = $type;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
