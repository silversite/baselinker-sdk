<?php

declare(strict_types=1);

namespace SilverSite\BaseLinker;

interface BaseLinkerClientInterface
{
    public function getStoragesListResource(): array;
}
