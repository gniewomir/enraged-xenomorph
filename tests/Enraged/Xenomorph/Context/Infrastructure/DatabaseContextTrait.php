<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Context\Infrastructure;

use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
use InvalidArgumentException;

trait DatabaseContextTrait
{
    protected function setUpDatabase() : void
    {
        (new ORMPurger($this->getEntityManager()))->purge();
    }

    protected function getEntityManager() : EntityManagerInterface
    {
        $entity_manager = $this->getContainer()->get(EntityManagerInterface::class);
        if ($entity_manager instanceof EntityManagerInterface) {
            return $entity_manager;
        }
        throw new InvalidArgumentException();
    }
}
