<?php
declare(strict_types=1);

namespace SilverSite\BaseLinker\Resource;

use SilverSite\BaseLinker\Model\Category;

interface CategoryResourceInterface
{
    public function setStorageId(string $storageId): void;

    public function addCategory(string $name, int $parentId = 0): Category;

    public function updateCategory(string $name, int $categoryId, int $parentId = 0): Category;
}
