<?php
declare(strict_types=1);

namespace Party\Command;

use Party\Model\Organization;
use Party\Repository\OrganizationRepository;

class CreateOrganizationHandler
{
    public function __construct(
        private OrganizationRepository $repository,
    )
    {
    }

    public function __invoke(CreateOrganization $command): void
    {
        $organization = new Organization(
            $command->getAddress(),
            $command->getPhoneNumber(),
            $command->getEmail()
        );

        $this->repository->save($organization);
        $this->repository->flush();
    }
}
