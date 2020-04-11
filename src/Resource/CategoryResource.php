<?php

declare(strict_types=1);

namespace SilverSite\BaseLinker\Resource;

use SilverSite\BaseLinker\BaseLinkerRequestInterface;
use SilverSite\BaseLinker\Model\CategoryRequest;
use SilverSite\BaseLinker\Model\CategoryResponse;

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

    public function addCategory(CategoryRequest $categoryRequest): CategoryResponse
    {
        return $this->request->post(CategoryResponse::class, self::METHOD_NAME, $categoryRequest);
    }

    public function updateCategory(CategoryRequest $categoryRequest): CategoryResponse
    {
        return $this->request->post(
            CategoryResponse::class,
            self::METHOD_NAME,
            [
                'storage_id' => $this->storageId,
                'name' => $name,
                'parent_id' => $parentId,
                'category_id' => $categoryId,
            ]
        );
    }
}
