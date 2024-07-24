<?php
declare(strict_types=1);

namespace Party\Model;

use Party\Repository\OrganizationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrganizationRepository::class)]
final class Organization extends Party
{
}
