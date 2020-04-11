<?php

declare(strict_types=1);

namespace SilverSite\BaseLinker\Resource;

use SilverSite\BaseLinker\BaseLinkerRequestInterface;
use SilverSite\BaseLinker\Model\StorageResponse;
use SilverSite\BaseLinker\Model\StoragesResponse;

final class StoragesResource implements StoragesResourceInterface
{
    private const METHOD_NAME = 'getStoragesList';

    private BaseLinkerRequestInterface $request;

    public function __construct(BaseLinkerRequestInterface $request)
    {
        $this->request = $request;
    }

    public function getStoragesList(): array
    {
        /** @var StoragesResponse $response */
        $response = $this->request->post(StoragesResponse::class, self::METHOD_NAME);

        $storages = [];

        foreach ($response->storages as $storage) {
            $storages[] = new StorageResponse($storage['storage_id'] ?? $storage['id'], $storage['name']);
        }

        return $storages;
    }
}
