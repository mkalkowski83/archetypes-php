<?php
declare(strict_types=1);

namespace Party\Model;

use Webmozart\Assert\Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
final class PartyRoleType
{
    public const BACKEND = 'backend';
    public const FRONTEND = 'frontend';

    public const TEAM = 'team';
    public const EM = 'em';

    private const TYPES = [
        self::BACKEND,
        self::FRONTEND,
        self::EM,
        self::TEAM
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
