<?php

declare(strict_types=1);

namespace SilverSite\BaseLinker\HttpClient;

interface HttpClientAdapterInterface
{
    public function post(string $method, array $parameters = []): string;
}
