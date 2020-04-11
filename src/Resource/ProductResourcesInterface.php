<?php

declare(strict_types=1);

namespace SilverSite\BaseLinker\Resource;

use SilverSite\BaseLinker\Model\ProductRequest;
use SilverSite\BaseLinker\Model\ProductResponse;

interface ProductResourcesInterface
{
    public function add(ProductRequest $productRequest): ProductResponse;

    public function update(int $productId, ProductRequest $productRequest): ProductResponse;
}
