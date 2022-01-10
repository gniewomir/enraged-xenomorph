<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Integration\Application\Fixtures;

use Doctrine\Persistence\ObjectManager;
use Enraged\Xenomorph\Application\Fixtures\DevFixtures;
use Tests\Enraged\Xenomorph\Integration\IntegrationTestCase;

class DevFixturesTest extends IntegrationTestCase
{
    public function test_for_smoke_when_loading_fixtures()
    {
        $subject = $this
            ->getContainer()
            ->get(DevFixtures::class);

        $subject
            ->load(
                $this
                    ->getMockBuilder(ObjectManager::class)
                    ->getMock()
            );
        $this->assertEquals(['dev'], DevFixtures::getGroups());
    }
}
