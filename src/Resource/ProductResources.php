<?php

declare(strict_types=1);

namespace SilverSite\BaseLinker\Resource;

use SilverSite\BaseLinker\BaseLinkerRequestInterface;
use SilverSite\BaseLinker\Model\ProductRequest;
use SilverSite\BaseLinker\Model\ProductResponse;

final class ProductResources implements ProductResourcesInterface
{
    private const METHOD_NAME = 'addProduct';

    private BaseLinkerRequestInterface $request;

    private string $storageId;

    public function __construct(BaseLinkerRequestInterface $request, string $storageId)
    {
        $this->request = $request;
        $this->storageId = $storageId;
    }

    public function add(ProductRequest $productRequest): ProductResponse
    {
        $productRequest->storageId = $this->storageId;

        return $this->request->post(ProductResponse::class, self::METHOD_NAME, $productRequest->jsonSerialize());
    }

    public function update(int $productId, ProductRequest $productRequest): ProductResponse
    {
        $productRequest->productId = $productId;

        return $this->add($productRequest);
    }
}
