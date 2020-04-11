<?php

declare(strict_types=1);

namespace SilverSite\BaseLinker\Model;

final class CategoryRequest implements RequestInterface
{
    public string $storageId;
    public string $name;
    public int $parentId = 0;
    public ?int $categoryId = null;

    public function jsonSerialize(): array
    {
        return [
            'storage_id' => $this->storageId,
            'name' => $this->name,
            'parent_id' => $this->parentId,
            'category_id' => $this->categoryId,
        ];
    }
}
