<?php

declare(strict_types=1);

namespace SilverSite\BaseLinker\Resource;

use SilverSite\BaseLinker\BaseLinkerRequestInterface;
use SilverSite\BaseLinker\Model\Storage;
use SilverSite\BaseLinker\Model\Storages;

final class StoragesResource implements StoragesResourceResourceInterface
{
    private const METHOD_NAME = 'getStoragesList';

    private BaseLinkerRequestInterface $request;

    public function __construct(BaseLinkerRequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * @throws StoragesNotFound
     */
    public function getStoragesList(): array
    {
        /** @var Storages $response */
        $response = $this->request->post(Storages::class, self::METHOD_NAME);

        if (\ERROR::class === $response->status) {
            throw new StoragesNotFound('No storage found!');
        }

        $storages = [];

        foreach ($response->storages as $storage) {
            $storages[] = new Storage($storage['storage_id'] ?? $storage['id'], $storage['name']);
        }

        return $storages;
    }
}
