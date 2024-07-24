<?php
declare(strict_types=1);

namespace Party\Test\Command;

use Doctrine\ORM\EntityManagerInterface;
use Override;
use Party\Command\CreateOrganizationHandler;
use Party\Repository\OrganizationRepository;
use Party\Model\Organization;
use Party\Command\CreateOrganization;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CreateOrganizationHandlerTest extends KernelTestCase
{
    #[Override]
    protected function setUp(): void
    {
        self::bootKernel();
        dd(static::$kernel->getContainer());
        $handler = static::$kernel->getContainer()->get(OrganizationRepository::class);
    }

    public function testCreateOrganization(): void
    {
        // Arrange
        $address = '123 Main St';
        $phoneNumber = '555-1234';
        $email = 'info@example.com';
        $command = new CreateOrganization($address, $phoneNumber, $email);
        // Act
        $handler = self::$kernel->getContainer()->get(CreateOrganizationHandler::class);
        $handler->__invoke($command);

        // Assert
        $repository = self::getContainer()->get(OrganizationRepository::class);
        $organization = $repository->findOneBy(['email' => $email]);

        $this->assertInstanceOf(Organization::class, $organization);
    }
}
