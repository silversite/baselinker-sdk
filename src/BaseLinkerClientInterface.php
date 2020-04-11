<?php

declare(strict_types=1);

namespace SilverSite\BaseLinker;

use SilverSite\BaseLinker\Resource\CategoryResourceInterface;
use SilverSite\BaseLinker\Resource\ProductResourcesInterface;
use SilverSite\BaseLinker\Resource\StoragesResourceInterface;

interface BaseLinkerClientInterface
{
    public function getStoragesResource(): StoragesResourceInterface;
    public function getCategoryResource(string $storageId): CategoryResourceInterface;
    public function getProductResource(string $storageId): ProductResourcesInterface;
}
