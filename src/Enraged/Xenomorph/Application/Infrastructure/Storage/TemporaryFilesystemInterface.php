<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Application\Infrastructure\Storage;

use League\Flysystem\FilesystemReader;
use League\Flysystem\FilesystemWriter;

interface TemporaryFilesystemInterface extends FilesystemReader, FilesystemWriter
{
}
