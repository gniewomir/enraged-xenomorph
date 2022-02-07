<?php

namespace Enraged\Xenomorph\Infrastructure\Storage\Reader;

use Enraged\Xenomorph\StorageFilesystemInterface;
use Enraged\Xenomorph\TemporaryFilesystemInterface;

interface ReaderInterface
{
    public function read(TemporaryFilesystemInterface|StorageFilesystemInterface $filesystem, string $location): array;
}