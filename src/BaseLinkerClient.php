<?php

declare(strict_types=1);

namespace SilverSite\BaseLinker;

use SilverSite\BaseLinker\Resource\CategoryResource;
use SilverSite\BaseLinker\Resource\CategoryResourceInterface;
use SilverSite\BaseLinker\Resource\StoragesResource;
use SilverSite\BaseLinker\Resource\StoragesResourceInterface;

class BaseLinkerClient implements BaseLinkerClientInterface
{
    private BaseLinkerRequestInterface $request;

    public function __construct(BaseLinkerRequestInterface $request)
    {
        $this->request = $request;
    }

    public function getStoragesResource(): StoragesResourceInterface
    {
        return new StoragesResource($this->request);
    }

    public function getCategoryResource(string $storageId): CategoryResourceInterface
    {
        return new CategoryResource($this->request, $storageId);
    }
}
