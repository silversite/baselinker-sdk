<?php

declare(strict_types=1);

namespace SilverSite\BaseLinker;

interface BaseLinkerRequestInterface
{
    public function post(string $modelClass, string $method, array $parameters = []): object;
}
