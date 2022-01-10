<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Integration\Infrastructure\Storage\Filesystem;

use Enraged\Xenomorph\TemporaryFilesystemInterface;
use Tests\Enraged\Xenomorph\Integration\IntegrationTestCase;

class TemporaryFilesystemTest extends IntegrationTestCase
{
    public function test_for_smoke_of_temporary_filesystem()
    {
        $subject = $this
            ->getContainer()
            ->get(TemporaryFilesystemInterface::class);
        $subject->write('test.txt', $content = 'test');
        $this->assertEquals(
            $content,
            $subject->read('test.txt')
        );
    }
}
