<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Integration\Infrastructure\Storage\Filesystem;

use Enraged\Xenomorph\Infrastructure\Storage\Filesystem\StorageFilesystem;
use Tests\Enraged\Xenomorph\Integration\IntegrationTestCase;

class StorageFilesystemTest extends IntegrationTestCase
{
    public function test_smoke()
    {
        $subject = $this
            ->getContainer()
            ->get(StorageFilesystem::class);
        $subject->write('test.txt', $content = 'test');
        $this->assertEquals(
            $content,
            $subject->read('test.txt')
        );
    }
}
