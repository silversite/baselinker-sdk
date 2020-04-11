<?php

declare(strict_types=1);

namespace SilverSite\BaseLinker\Model;

final class ProductResponse
{
    public string $status;
    public string $storageId;
    public string $productId;
    public array $warnings;
}
