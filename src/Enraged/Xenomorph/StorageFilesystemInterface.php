<?php

declare(strict_types=1);

namespace Enraged\Xenomorph;

use League\Flysystem\FilesystemReader;
use League\Flysystem\FilesystemWriter;

interface StorageFilesystemInterface extends FilesystemReader, FilesystemWriter
{
}
