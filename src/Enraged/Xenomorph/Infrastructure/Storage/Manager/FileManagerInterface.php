<?php

namespace Enraged\Xenomorph\Infrastructure\Storage\Manager;

use Enraged\Xenomorph\StorageFilesystemInterface;
use Enraged\Xenomorph\TemporaryFilesystemInterface;

interface FileManagerInterface
{
    public function read(TemporaryFilesystemInterface|StorageFilesystemInterface $filesystem, string $location): array;

    public function write(TemporaryFilesystemInterface|StorageFilesystemInterface $filesystem, string $location, array $data): array;
}