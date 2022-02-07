<?php

namespace Enraged\Xenomorph\Infrastructure\Storage\Transformer;

interface TransformerInterface
{
    public function transform(array $data): array;
}