<?php

namespace Enraged\Xenomorph\Infrastructure\Storage\Transformer;

class SkipUntilHeaderTransformer implements TransformerInterface
{
    protected array $header;

    public function __construct(array $header) {
        $this->header = $header;
    }

    public function transform(array $data): array
    {
        return $data;
    }
}