<?php
declare(strict_types=1);

namespace Party\Model;

use Doctrine\ORM\Mapping as ORM;
use Webmozart\Assert\Assert;
#[ORM\Embeddable]
final class PartyRelationshipType
{
    public const ASSIGNED_TO = 'assignedTo';

    private const TYPES = [
        self::ASSIGNED_TO
    ];

    #[ORM\Column(type: 'string')]
    private string $type;

    public function __construct(string $type)
    {
        Assert::that($type)->inArray(self::TYPES);
        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
