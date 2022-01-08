<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Infrastructure\Storage\Filesystem;

use Enraged\Xenomorph\Application\Infrastructure\Storage\TemporaryFilesystemInterface;
use League\Flysystem\Filesystem;

class TemporaryFilesystem extends Filesystem implements TemporaryFilesystemInterface
{
}
