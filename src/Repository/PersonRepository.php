<?php
declare(strict_types=1);

namespace Party\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Party\Model\Organization;
use Party\Model\Person;

class PersonRepository
{
    private EntityRepository $repository;
    public function __construct(
        private EntityManagerInterface $marketingEntityManager,
    ) {
        $this->repository = $this->marketingEntityManager->getRepository(Person::class);
    }
}
