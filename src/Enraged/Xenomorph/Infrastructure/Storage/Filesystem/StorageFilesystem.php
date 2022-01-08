<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Infrastructure\Storage\Filesystem;

use Enraged\Xenomorph\Application\Infrastructure\Storage\StorageFilesystemInterface;
use League\Flysystem\Filesystem;

class StorageFilesystem extends Filesystem implements StorageFilesystemInterface
{
}
