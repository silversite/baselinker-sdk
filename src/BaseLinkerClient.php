<?php

declare(strict_types=1);

namespace SilverSite\BaseLinker;

use SilverSite\BaseLinker\Resource\StoragesNotFound;
use SilverSite\BaseLinker\Resource\StoragesResource;

class BaseLinkerClient implements BaseLinkerClientInterface
{
    private BaseLinkerRequestInterface $request;

    public function __construct(BaseLinkerRequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * @throws StoragesNotFound
     */
    public function getStoragesListResource(): array
    {
        return (new StoragesResource($this->request))->getStoragesList();
    }
}
