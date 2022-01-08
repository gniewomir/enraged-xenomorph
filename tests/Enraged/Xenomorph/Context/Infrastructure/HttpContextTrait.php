<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Context\Infrastructure;

use Enraged\Xenomorph\Infrastructure\HTTP\Client\HttpClientInterface;
use Enraged\Xenomorph\Infrastructure\HTTP\Client\InMemoryHttpClient;
use InvalidArgumentException;

trait HttpContextTrait
{
    public function httpClient() : InMemoryHttpClient
    {
        $http_client = $this->getContainer()->get(HttpClientInterface::class);
        if ($http_client instanceof InMemoryHttpClient) {
            return $http_client;
        }
        throw new InvalidArgumentException('Do not use live http client when testing. Check your services configuration.');
    }
}
