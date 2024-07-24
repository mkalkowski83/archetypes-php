<?php
declare(strict_types=1);
namespace Party\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Party\Model\Organization;

class OrganizationRepository
{
    private EntityRepository $repository;
    public function __construct(
        private EntityManagerInterface $entityManager,
    ) {
        $this->repository = $this->entityManager->getRepository(Organization::class);
    }
    public function save(Organization $organization): void
    {
        $this->entityManager->persist($organization);
    }
    public function flush(): void
    {
        $this->entityManager->flush();
    }
}
