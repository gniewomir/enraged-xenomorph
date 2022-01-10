<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Integration\Infrastructure\Storage\Filesystem;

use Enraged\Xenomorph\StorageFilesystemInterface;
use Tests\Enraged\Xenomorph\Integration\IntegrationTestCase;

class StorageFilesystemTest extends IntegrationTestCase
{
    public function test_for_smoke_of_storage_filesystem()
    {
        $subject = $this
            ->getContainer()
            ->get(StorageFilesystemInterface::class);
        $subject->write('test.txt', $content = 'test');
        $this->assertEquals(
            $content,
            $subject->read('test.txt')
        );
    }
}
