<?php

namespace Enraged\Xenomorph\Infrastructure\Storage\Manager\ExampleManager;

use Enraged\Xenomorph\Infrastructure\Exception\InfrastructureNotImplementedException;
use Enraged\Xenomorph\Infrastructure\Storage\Manager\FileManagerInterface;
use Enraged\Xenomorph\Infrastructure\Storage\Reader\ReaderInterface;
use Enraged\Xenomorph\Infrastructure\Storage\Transformer\LabelUsingHeaderTransformer;
use Enraged\Xenomorph\Infrastructure\Storage\Transformer\SkipUntilHeaderTransformer;
use Enraged\Xenomorph\StorageFilesystemInterface;
use Enraged\Xenomorph\TemporaryFilesystemInterface;

class ExampleManager implements FileManagerInterface
{
    protected ReaderInterface $reader;

    public function __construct(ReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    public function read(TemporaryFilesystemInterface|StorageFilesystemInterface $filesystem, string $location): array
    {
        $data = $this->reader->read($filesystem, $location);
        $data = (new SkipUntilHeaderTransformer([$idHeader = 'id', $dateHeader = 'data', $amountHeader = 'amount']))->transform($data);
        $data = (new ThrowIfEmpty())->transform($data);
        $data = (new LabelUsingHeaderTransformer())->transform($data);
        $data = (new TransformColumnToDateTimeImmutable($dateHeader))->transform($data);
        $data = (new TransformColumnToMoney($amountHeader))->transform($data);
        foreach ($data as $key => $row) {
            $data[$key] = new ExampleEntry(
                $row[$idHeader],
                $row[$dateHeader],
                $row[$amountHeader]
            );
        }
        return $data;
    }

    public function write(TemporaryFilesystemInterface|StorageFilesystemInterface $filesystem, string $location, array $data): array
    {
        throw new InfrastructureNotImplementedException();
    }
}