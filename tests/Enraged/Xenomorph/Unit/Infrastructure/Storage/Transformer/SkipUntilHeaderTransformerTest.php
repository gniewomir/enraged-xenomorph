<?php

namespace Tests\Enraged\Xenomorph\Unit\Infrastructure\Storage\Transformer;

use Enraged\Xenomorph\Infrastructure\Storage\Transformer\SkipUntilHeaderTransformer;
use PHPUnit\Framework\TestCase;

class SkipUntilHeaderTransformerTest extends TestCase
{

    public function testTransform()
    {
        $this->assertEquals(
            [
                ['id', 'date', 'money'],
                ['Fv 1/1/2022', '1/1/2022', '10$']
            ],
            (new SkipUntilHeaderTransformer(['id', 'date', 'money']))->transform(
                [
                    ['dfsdf', 'dfsdf', 'dfsdf'],
                    ['dfsdf', 'dfsdf', 'dfsdf'],
                    ['dfsdf', 'dfsdf', 'dfsdf'],
                    ['id', 'date', 'money'],
                    ['Fv 1/1/2022', '1/1/2022', '10$']
                ]
            )
        );
    }
}
