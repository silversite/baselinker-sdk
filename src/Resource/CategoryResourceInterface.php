<?php

declare(strict_types=1);

namespace SilverSite\BaseLinker\Resource;

use SilverSite\BaseLinker\Model\CategoryRequest;
use SilverSite\BaseLinker\Model\CategoryResponse;

interface CategoryResourceInterface
{
    public function setStorageId(string $storageId): void;

    public function addCategory(CategoryRequest $categoryRequest): CategoryResponse;

    public function updateCategory(CategoryRequest $categoryRequest): CategoryResponse;
}
