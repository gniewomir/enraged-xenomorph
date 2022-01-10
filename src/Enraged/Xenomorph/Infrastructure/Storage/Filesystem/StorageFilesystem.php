<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Infrastructure\Storage\Filesystem;

use Enraged\Xenomorph\StorageFilesystemInterface;
use League\Flysystem\Filesystem;

class StorageFilesystem extends Filesystem implements StorageFilesystemInterface
{
}
