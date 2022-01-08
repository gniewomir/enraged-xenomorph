<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Application\Fixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Enraged\Xenomorph\Application\Fixtures\Context\Context;

class DevFixtures extends Fixture implements FixtureGroupInterface
{
    protected Context $context;

    public function __construct(Context $context)
    {
        $this->context = $context;
    }

    public static function getGroups() : array
    {
        return ['dev'];
    }

    public function load(ObjectManager $manager) : void
    {
        $this
            ->context
            ->createDomainObject();
    }
}
