<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Infrastructure\Storage\Adapter;

use League\Flysystem\Local\LocalFilesystemAdapter;

class TemporaryAdapter extends LocalFilesystemAdapter
{
    public function __construct(string $location)
    {
        parent::__construct($location);
    }
}
