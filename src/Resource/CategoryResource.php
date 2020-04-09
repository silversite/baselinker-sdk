<?php

declare(strict_types=1);

namespace SilverSite\BaseLinker\Resource;

use SilverSite\BaseLinker\BaseLinkerRequestInterface;
use SilverSite\BaseLinker\Model\Category;

final class CategoryResource implements CategoryResourceInterface
{
    private const METHOD_NAME = 'addCategory';

    private BaseLinkerRequestInterface $request;

    private string $storageId;

    public function __construct(BaseLinkerRequestInterface $request, string $storageId)
    {
        $this->request = $request;
        $this->storageId = $storageId;
    }

    public function setStorageId(string $storageId): void
    {
        $this->storageId = $storageId;
    }

    public function addCategory(string $name, int $parentId = 0): Category
    {
        /** @var Category $result */
        $result = $this->request->post(
            Category::class,
            self::METHOD_NAME,
            [
                'storage_id' => $this->storageId,
                'name' => $name,
                'parent_id' => $parentId,
                'category_id' => '',
            ]
        );

        return $result;
    }

    public function updateCategory(string $name, int $categoryId, int $parentId = 0): Category
    {
        /** @var Category $result */
        $result = $this->request->post(
            Category::class,
            self::METHOD_NAME,
            [
                'storage_id' => $this->storageId,
                'name' => $name,
                'parent_id' => $parentId,
                'category_id' => $categoryId,
            ]
        );

        return $result;
    }
}
